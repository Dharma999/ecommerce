@extends('backend.layouts.app')

@section('content')

<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-7">
       @if (@isset($banner))
       <form action="{{route('banner.update', $banner)}}" method="post" enctype="multipart/form-data">
        @method('PATCH')           
       @else
       <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
        @endisset

       @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{old('title', @$banner->title)}}">
            @error('title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="slugan">Slugan</label>
            <input type="text" name="slugan" class="form-control" value="{{old('slugan', @$banner->slugan)}}">

            @error('slugan')
                <span class="text-danger"> {{$message}} </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Banner</label>
            <input type="file" name="image" class="form-control">

            @if(@isset($banner))
            <img src="{{asset('uploads/banner/thumbnail/'.$banner->image)}}" alt="Image not found" height="100" width="200">
            @endif

            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
           

        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Save</button>
        </div>
        </form>

        <div class="col-md-3"> </div>
    </div>
</div>

@endsection