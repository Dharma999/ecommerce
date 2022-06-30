@extends('backend.layouts.app')

@section('content')
    @if (isset($category))
        <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
        @else
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
    @endif

    @csrf

    <dov class="row">
        <div class="col-2">
            
        </div>

        <div class="col-8">
            <div class="form-group">
                <label for="title">Category</label>
                <input type="text" name="title" class="form-control" value="{{old('title', @$category->title)}}">
                @error('title')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right"> Save </button>
            </div>
        </div>

        <div class="col-2"></div>
    </dov>

            </form>
@endsection
