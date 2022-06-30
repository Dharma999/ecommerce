@extends('frontend.layouts.app')

@section('content')


</div>

<div class="container mt-5 mb-5" style="height: 100px;">
    <h2 class="text-center">Shop Details</h2>
</div>

<!--Carousel and navbar are ending now-->


<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach ($product->featured_images as $index=>$image)
                        <div class="carousel-item {{($index==0) ? 'active': ''}}">
                            <img src="{{asset($product->folderName.$image->image)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach

                    @foreach ($product->product_images as $index=>$image)
                        <div class="carousel-item">
                            <img src="{{asset($product->folderName.$image->image)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                  
                
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">

            <h1 class="display-5">
                Stylish shirt for Boy
            </h1>
            <h2>Nrs 500 </h2>
            <p>
                sed,s harum aut? Sunt delectus voluptates, repellat ea perspiciatis veritatis. Repellat aperiam excepturi fug
            </p>
            <p>
                <strong>Select Size</strong> <br>
                @foreach ($product->sizes as $size)
                    <input type="radio" name="size" value="{{$size->size}}" class="">
                    <label for="size" class="radio">{{$size->size}}</label>
                @endforeach
               

            </p>

            <p>
                <strong> Select Color</strong> <br>
                @foreach ($product->product_images as $color)
                    <input type="radio" name="color" value="{{$color->color}}" class="">
                    <label for="size" class="radio"> {{ucfirst($color->color)}}</label>
                @endforeach
               
            </p>

            <h4>
                {{-- <del> NRs: </del> --}}
                 NRs: {{$product->price}}
                <button type="submit" class="btn btn-primary"> Order Now </button>
            </h4>
        </div>
    </div>
</div>
    
@endsection