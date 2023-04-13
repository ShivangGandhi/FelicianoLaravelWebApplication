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
            <a class="btn btn-primary" href="{{ route('admin.menu.create') }}">Add New Item</a>
            <table class="table">
              <thead class="black">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Type</th>
                  <th scope="col">Image</th>
                  <th scope="col">Operations</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                @foreach($menus as $menu)
                  <td>{{ $menu->id}}</td>
                  <td>{{ $menu->name}}</td>
                  <td>{{ $menu->description}}</td>
                  <td>{{ $menu->price}}</td>
                  <td>{{ $menu->type}}</td>
                  <td> <img src="{{ asset('images/'.$menu->image) }}" width="50" height="50" alt=""> 
                  </td>
                  <td><a href="{{ route('admin.menu.edit',$menu->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                  
                    <form method="POST" id="delete-form-{{ $menu->id }}" action="{{ route('admin.menu.delete',$menu->id) }}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    </form>  <button class="btn btn-raised btn-danger btn" 
                      onclick="if (confirm('Are you Sure to Delete this Menu Item? ')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $menu->id }}').submit();
                      }else{
                        event.preventDefault();
                      }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                  </td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$menus->links()}}
        </x-slot>
    </x-backend.card>
@endsection
