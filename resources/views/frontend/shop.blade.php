@extends('frontend.layouts.app')
@section('content')
<div style="height:20vh;">
    <h2 align="center" class="mt-5">
       ----- Our Products -----
    </h2>
</div>

<div class="container mt-5">
    <div class="row mt-4">
        
       @foreach ($products as $product)

       <div class="col-md-6 col-lg-3 col-sm-12 mt-4">
        <div class="card">
            <div class="card-body">
                <div class="product-img">
                    <img src="{{asset($product->folderName.$product->featured_images[0]->image)}}" class="card-img" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" alt="Image not found">
                </div>
                <h4>
                   {{$product->title}}
                </h4>
                    
              <h5>
                NRS: {{$product->price}}
              </h5>
            </div>
            <div class="card-footer">
                <a href="{{route('product.detail', $product->slug)}}" class="btn btn-primary">Buy Now</a>
                <a href="{{route('add-to-cart', $product->slug)}}" class="btn btn-danger">Add to Cart</a>
            </div>
        </div>
    </div>
           
       @endforeach
</div>


@endsection