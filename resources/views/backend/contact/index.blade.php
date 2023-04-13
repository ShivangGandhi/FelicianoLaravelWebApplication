@extends('backend.layouts.app')

@section('title', __('Contact Management'))

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
            @lang('Contact Management')
        </x-slot>

        <x-slot name="body">
            <table class="table">
              <thead class="black">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Message</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                @foreach($contacts as $contact)
                  <td>{{ $contact->id}}</td>
                  <td>{{ $contact->name}}</td>
                  <td>{{ $contact->phone}}</td>
                  <td>{{ $contact->email}}</td>
                  <td>{{ $contact->subject}}</td>
                  <td>{{ $contact->message}}</td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$contacts->links()}}
        </x-slot>
    </x-backend.card>
@endsection
