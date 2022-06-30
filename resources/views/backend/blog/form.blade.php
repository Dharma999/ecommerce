@extends('backend.layouts.app');

@section('content')
    @if (@isset($blog))
        <form action="{{ route('blog.update', $blog) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
        @else
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
    @endif

    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title', @$blog->title)}}">
                @error('title')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror

                @if (@isset($blog))
                    <img src="{{ asset('uploads/blog/thumbnail/' . $blog->image) }}" alt="Image not Found" width="200"
                        height="100">
                @endif

            </div>

            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea name="summary" rows="2" class="form-control"> {{old('summary', @$blog->summary) }} </textarea>
                @error('summary')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" rows="4" class="form-control"> {{old('content'), @$blog->content }}</textarea>
                @error('content')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>


        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="status"> Status </label>
                <select name="status" class="form-control">
                    <option value="Active"> Active </option>
                    <option value="InActive">InActive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="meta_title">Meta Title </label>
                <input type="text" name="meta_title" class="form-control" value="{{old('meta_title', @$blog->meta_title)}}">
                @error('meta_title')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control" rows="3"> {{old('meta_keywords', @$blog->meta_keywords)}} </textarea>
                @error('meta_keywords')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="4"> {{old('meta_description', @$blog->meta_description)}} </textarea>
                @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>

        </div>

    </div>
    </form>
@endsection
