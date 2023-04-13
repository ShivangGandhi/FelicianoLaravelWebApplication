@extends('backend.layouts.app')

@section('title', __('Reservation Management'))

@section('breadcrumb-links')
@include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')

@if(session('successMessage'))
<div class="alert alert-success" role="alert">
  {{ session('successMessage') }}
</div>
@endif
<x-backend.card>
  <x-slot name="header">
    @lang('Reservation Management')
  </x-slot>

  <x-slot name="body">
    <a class="btn btn-primary" href="{{ route('admin.menu.create') }}">Add New Item</a>
    <table class="table">
      <thead class="black">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Person</th>
          <th scope="col">Status</th>
          <th scope="col">Operation</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach($reservations as $reservation)
          @if(($reservation->time >= date('H:i:s')) and ($reservation->date >= date('Y-m-d')))
          <td>{{ $reservation->id}}</td>
          <td>{{ $reservation->name}}</td>
          <td>{{ $reservation->email}}</td>
          <td>{{ $reservation->phone}}</td>
          <td>{{ $reservation->date}}</td>
          <td>{{ $reservation->time}}</td>
          <td>{{ $reservation->person}}</td>
          <td>{{ $reservation->status}}</td>
          <td>
            @if($reservation->status == 'Pending')
            <a href="{{route('admin.reservation.update',$reservation->id)}}" class="btn btn-success">Approve</a>
            <form method="POST" id="delete-form-{{ $reservation->id }}" action="{{ route('admin.reservation.delete',$reservation->id) }}" style="display: none;">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form> <button class="btn btn-raised btn-danger btn" onclick="if (confirm('Are you Sure to Delete this Menu Item? ')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $reservation->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
            @elseif($reservation->status == 'Approved' and $reservation->time > date('H:i:s'))
            <a href="{{route('admin.reservation.update',$reservation->id)}}" class="btn btn-success">Pending</a>
            <form method="POST" id="delete-form-{{ $reservation->id }}" action="{{ route('admin.reservation.delete',$reservation->id) }}" style="display: none;">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form> <button class="btn btn-raised btn-danger btn" onclick="if (confirm('Are you Sure to Delete this Menu Item? ')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $reservation->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
            @else
            <form method="POST" id="delete-form-{{ $reservation->id }}" action="{{ route('admin.reservation.delete',$reservation->id) }}" style="display: none;">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form> <button class="btn btn-raised btn-danger btn" onclick="if (confirm('Are you Sure to Delete this Menu Item? ')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $reservation->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
            @endif
          </td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </x-slot>
</x-backend.card>
@endsection