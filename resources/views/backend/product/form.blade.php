@extends('backend.layouts.app')

@section('content')
    @if (isset($product))
        <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
        @else
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @endif

    @csrf

    <div class="row">
        <div class="ml-3 col-5">
            <div class="form-group">
                <label for="category"> Category </label>
                <select name="category" class="form-control">
                    <option value="">Please select</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" 
                            @if(@$product->category_id == $category->id)
                                selected
                            @endif >
                            {{$category->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="{{old('title', @$product->title)}}">
                @error('title')
                <span class="text-danger">
                {{$message}}
                </span>    
                @enderror
            </div>
            <div class="form-group">
                <label for="images">Featured Images</label>
                <div class="col-sm-10">
                    <div id="multi_image_picker" class="row"></div>
                </div>
            </div>
            
            @if(!(@$product->featured_images) == null)
            <div class="row">
                @foreach(@$product->featured_images as $image)
                <div class="col-md-2">
                    <img src="{{asset('uploads/products/thumbnail/'.$image->image)}}" alt="" class="img-fluid">
                </div>
                @endforeach
            </div>
            @endif

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="active" 
                        @if(@$product->status == 'active')
                        selected
                        @endif
                    >Active</option>
                    <option value="inactive" 
                        @if(@$product->status == 'inactive')
                        selected
                        @endif
                    >InActive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="summary">Summary:</label>
                <input type="text" name="summary" class="form-control" value="{{old('summary', @$product->summary)}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="3" class="form-control">{{old('description', @$product->description)}}</textarea>
            </div>
            <div class="form-group">
                <label for="size">Product Size</label>
                <input type="text" class="form-control" name="size" value="{{old('size', @$sizes)}}">
            </div>
        </div>
        <div class="ml-3 col-5">

            {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Image Gallery</label>
               
            </div> --}}

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" class="form-control" value="{{old('price', @$product->price)}}">
                <span class="text-danger">{{$errors->first('price')}}</span>
            </div>
            
            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text" name="qty" id="qty" class="form-control" value="{{old('qty', @$product->qty)}}">
                @error('qty')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="images">Color Images</label>
                <div class="col-sm-10">
                    <div id="color_image" class="row"></div>
                </div>
            </div>

            @if(!empty(@$product->product_images))
            <div class="row">
                @foreach(@$product->product_images as $image)
                <div class="col-md-2">
                    <img src="{{asset('uploads/products/thumbnail/'.$image->image)}}" alt="" class="img-fluid">
                </div>
                @endforeach
            </div>
            @endif


            <div class="form-group">
                <label for="color">Product Color</label>
                <input type="text" class="form-control" name="color" value="{{old('color', @$colors)}}">
                @error('color')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_title">Meta Title:</label>
                <input type="text" name="meta_title" class="form-control" value="{{old('meta_title', @$product->meta_title)}}">
                @error('meta_title')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea name="meta_keywords" rows="2" class="form-control">{{old('meta_keywords', @$product->meta_keywords)}}</textarea>
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" rows="2" class="form-control">{{old('meta_descriptin', @$product->meta_description)}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">
                    @if (isset($product))
                        {{"Update"}}
                    @else
                        {{"Save"}}
                    @endif
                </button>
            </div>
        </div>

    </div>
    </form>
@endsection

@push('script')
<script src="{{asset('js/spartan-multi-image-picker.js')}}"></script>
  <script>
        $(function(){
			$("#multi_image_picker").spartanMultiImagePicker({
				fieldName     : 'featuredImage[]', 
                maxCount      : 5,
                rowHeight     : '100px',
			});
		});


        $(function(){
			$("#color_image").spartanMultiImagePicker({
				fieldName     : 'colorImage[]', 
                rowHeight     : '100px',
			});
		});
  </script>
@endpush