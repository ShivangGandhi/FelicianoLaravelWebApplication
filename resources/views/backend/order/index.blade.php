@extends('backend.layouts.app')

@section('title', __('Menu Management'))

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
    @lang('Menu Management')
  </x-slot>

  <x-slot name="body">
    <table class="table">
      <thead class="black">
        <tr>
          <th scope="col" rowspan="2">Oid</th>
          <th scope="col" rowspan="2">Name</th>
          <!-- <th scope="col">Email</th> -->
          <th scope="col" rowspan="2">Phone</th>
          <!-- <th scope="col">Address</th> -->
          <!-- <th scope="col">Pincode</th> -->
          <!-- <th scope="col">Date</th> -->
          <th scope="col" rowspan="2">Time</th>
          <!-- <th scope="col">Suggestion</th> -->
          <th scope="col" rowspan="2">Payment Status</th>
          <th scope="col" colspan="2">Items</th>
          <!-- <th scope="col">Coupon Code</th> -->
          <th scope="col" rowspan="2">Order Total</th>
          <th scope="col" rowspan="2">Status</th>
          <th scope="col" rowspan="2">Operations</th>
        </tr>
        <tr>
          <th scope="col">Item</th>
          <th scope="col">Quantity</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          
          @foreach($orders as $order)
          <?php
          $items = [];
          $quantities = [];
          $arrays = json_decode($order->order);
          foreach ($arrays as $array){
          foreach ($array as $key => $value) {
            array_push($items, $key);
            array_push($quantities, $value);
          }
        }
          ?>
          <td>{{ $order->id}}</td>
          <td>{{ $order->name}}</td>
          <td>{{ $order->phone}}</td>
          <td>{{ $order->time}}</td>
          <td>{{ $order->payment_status}}</td>
          <td>@foreach($items as $item){{$item}} <br> @endforeach</td>
          <td>@foreach($quantities as $item){{$item}} <br> @endforeach</td>
          <td>{{ $order->total}}</td>
          <td>{{ $order->status}}</td>
          <td>
            @if($order->status == 'Pending')
            <a href="{{route('admin.order.update',$order->id)}}" class="btn btn-success">Accept</a>
            <form method="POST" id="delete-form-{{ $order->id }}" action="{{ route('admin.order.delete',$order->id) }}" style="display: none;">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form> <button class="btn btn-raised btn-danger btn" onclick="if (confirm('Are you Sure to Delete this Order Item? ')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $order->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
            @elseif($order->status == 'Accepted')
            <a href="{{route('admin.order.update',$order->id)}}" class="btn btn-success">Pending</a>
            <form method="POST" id="delete-form-{{ $order->id }}" action="{{ route('admin.order.delete',$order->id) }}" style="display: none;">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form> <button class="btn btn-raised btn-danger btn" onclick="if (confirm('Are you Sure to Delete this Order Item? ')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $order->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
            @else
            <form method="POST" id="delete-form-{{ $order->id }}" action="{{ route('admin.order.delete',$order->id) }}" style="display: none;">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form> <button class="btn btn-raised btn-danger btn" onclick="if (confirm('Are you Sure to Delete this Order Item? ')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $order->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$orders->links()}}
  </x-slot>
</x-backend.card>
@endsection