@extends('backend.layouts.app')

@section('title', __('Blog Management'))

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
            @lang('Blog Management')
        </x-slot>

        <x-slot name="body">
            <a class="btn btn-primary" href="{{ route('admin.blog.create') }}">Add New Blog</a>
            <table class="table">
              <thead class="black">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date</th>
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col">Image</th>
                  <th scope="col">Operations</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                @foreach($blogs as $blog)
                  <td>{{ $blog->id}}</td>
                  <td>{{ $blog->date}}</td>
                  <td>{{ $blog->title}}</td>
                  <td>{{ strlen($blog->content) > 100 ? substr($blog->content,0,50).'...' : $blog->content }} }}</td>
                  <td> <img src="{{ asset('images/'.$blog->image) }}" width="50" height="50" alt=""> 
                  </td>
                  <td><a href="{{ route('admin.blog.edit',$blog->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                  
                    <form method="POST" id="delete-form-{{ $blog->id }}" action="{{ route('admin.blog.delete',$blog->id) }}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    </form>  <button class="btn btn-raised btn-danger btn" 
                      onclick="if (confirm('Are you Sure to Delete this Blog? ')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $blog->id }}').submit();
                      }else{
                        event.preventDefault();
                      }"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                  </td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$blogs->links()}}
        </x-slot>
    </x-backend.card>
@endsection
