@extends('backend.layouts.app')

@section('title', __('Add Item'))

@section('content')



    <x-backend.card>
        <x-slot name="header">
            @lang('Add Item')
        </x-slot>

        <x-slot name="body">
            @lang('')
            <a class="pull-right btn btn-default btn-primary" href="{{route('admin.menu')}}">Go Back</a><br>
          <form action="{{route('admin.menu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="itemName">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Enter Item Name">
              </div>
              <div class="form-group">
                <label for="itemDescription">Item Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type">
                  <option value="Breakfast">Breakfast</option>
                  <option value="Lunch">Lunch</option>
                  <option value="Dinner">Dinner</option>
                  <option value="Drinks">Drinks</option>
                  <option value="Deserts">Deserts</option>
                </select>
              </div>
              <div class="form-group">
                <label for="featureImage">Feature Image</label><br>
                <input type="file" class="form-control-file" id="image" name="image">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" aria-describedby="" placeholder="Enter Item Price">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </x-slot>
    </x-backend.card>
@endsection

