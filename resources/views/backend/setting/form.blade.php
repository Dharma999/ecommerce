@extends('backend.layouts.app')

@section('content')
@if (isset($setting))
<form action="{{ route('setting.update', $setting) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')

@else
    <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
@endif
@csrf

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="file" name="icon" class="form-control">

                @if(isset($setting))
                <img src="{{asset('uploads/setting/thumbnail/'.$setting->icon)}}" alt="Image not found" width="200" height="100">
                @endif

            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control">

                @if(isset($setting))
                <img src="{{asset('uploads/setting/thumbnail/'.$setting->logo)}}" alt="Image not found" width="200" height="100">
                @endif

                {{-- <span class="text-danger">{{$errors->first('logo')}}</span> --}}


            </div>

            <div class="form-group">
                <label for="site_name"> Site Name</label>
                <input type="text" name="site_name" class="form-control" value="{{@$setting->site_name}}">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{@$setting->email}}">
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{@$setting->address}}">
            </div>
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{@$setting->meta_title}}">
            </div>
            <div class="form-group">
                <label for="meta_keywords">Meta keywords</label>
               <textarea name="meta_keywords" rows="2" class="form-control">{{@$setting->meta_keywords}}</textarea>
            </div>
        </div>

       

        <div class="col-md-4">
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" rows="3" class="form-control">{{@$setting->meta_description}}</textarea>
            </div>

            <div class="form-group">
                <label for="facebook_link">Facebook Link</label>
            <input type="text" name="facebook_link" class="form-control" value="{{@$setting->facebook_link}}">
            </div>
            <div class="form-group">
                <label for="twitter_link">Twitter Link</label>
                <input type="text" name="twitter_link" class="form-control" value="{{@$setting->twitter_link}}">
            </div>
            <div>
                <label for="instagram_link"> Instagram_link </label>
                <input type="text" name="instagram_link" class="form-control" value="{{@$setting->instagram_link}}">
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-success"> Save </button>
            </div>
        </div>
    </div>
</form>
@endsection
