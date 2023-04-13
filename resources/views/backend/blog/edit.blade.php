@extends('backend.layouts.app')

@section('title', __('Edit Blog'))

@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  {{ $error }}
</div>
@endforeach
@endif

<x-backend.card>
  <x-slot name="header">
    @lang('Edit Blog')
  </x-slot>

  <x-slot name="body">
    @lang('')
    <a class="pull-right btn btn-default btn-primary" href="{{route('admin.blog')}}">Go Back</a><br>
    <form action="{{route('admin.blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="blogTitle">Blog Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Enter Blog Title" value="{{ $blog->title }}">
      </div>
      <div class="form-group">
        <label for="blogContent">Blog Content</label>
        <!-- <textarea class="form-control" id="content" name="content" rows="20"> -->
        <textarea class="form-control" id="summary-ckeditor" name="content">
        {{ $blog->content }}
        </textarea>
      </div>
      <div class="form-group">
        <label for="featureImage">Feature Image</label><br>
        <img src="{{ asset('images/'.$blog->image) }}" height="100" width="100"><br>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </x-slot>
</x-backend.card>
@endsection