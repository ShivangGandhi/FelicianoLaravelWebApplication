@extends('backend.layouts.app')

@section('title', __('Add Blog'))

@section('content')



<x-backend.card>
  <x-slot name="header">
    @lang('Add Blog')
  </x-slot>

  <x-slot name="body">
    @lang('')
    <a class="pull-right btn btn-default btn-primary" href="{{route('admin.blog')}}">Go Back</a><br>
    <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="blogTitle">Blog Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Enter Blog Title">
      </div>
      <div class="form-group">
        <label for="blogContent">Blog Content</label>
        <!-- <textarea class="form-control" id="content" name="content" rows="20"></textarea> -->
        <textarea class="form-control" id="summary-ckeditor" name="content"></textarea>
      </div>
      <div class="form-group">
        <label for="featureImage">Feature Image</label><br>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </x-slot>
</x-backend.card>
@endsection