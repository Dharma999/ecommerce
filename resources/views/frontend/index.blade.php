@extends('frontend.layouts.app')

@section('content')


    <!--nav bar started-->

        <!--navbar end-->


        <!--carousel from here-->
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-12">

                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="{{asset('frontend/img/carousel-2.jpg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 style="color: white;">All Types of Clothes</h2>
                                <h5 style="color: white;">Here we provide all type of branded clothes</h5>
                            </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="{{asset('frontend/img/carousel-1.jpg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 style="color: white;">Electronics Things</h2>
                                <h5 style="color: white;">Here we also provide many, more electronics Things</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('frontend/img/carousel-2.jpg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 style="color: white;">All Type Of Gadget</h2>
                                <h5 style="color: white;">Here we provide many type of gadget for daily life</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
            <div class="col-md-6 col-sm-12 mt-2">

                <nav class="navbar navbar-expand">
                    <ul class="navbar-nav ms-5">
                        <li class="nav-item dropdown" style="list-style: none; text-align: center;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Clothes</a></li>
                                <li><a class="dropdown-item" href="#">Electronics</a></li>
                                <li><a class="dropdown-item" href="#">Gadget</a></li>
                                <li><a class="dropdown-item" href="#">Foods</a></li>
                                <li><a class="dropdown-item" href="#">Pots</a></li>
                                <li><a class="dropdown-item" href="#">Vehicles</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-heart"> 0</i></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cart.index')}}" class="nav-link">
                                <i class="fas fa-shopping-cart">{{Cart::count()}}</i>
                            </a>
                        </li>
                </nav>
                <br>

                <h5 align="center">
                    <strong>Here We Provide best Quality of Products</strong>
                </h5>
                <p align="center">
                    <br> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore ut, rerum accusamus quos totam mollitia sint culpa optio temporibus laborum labore aliquid quis iste saepe eaque consectetur nisi vero! Numquam sint, adipisci
                    iste at soluta vel quae harum dolorum dolores laboriosam aspernatur optio recusandae officia
                    <br>
                    <br>
                    <a href="#" class="btn btn-primary">Shop Now</a>
                </p>
            </div>
        </div>
    </div>

    <!--Carousel and navbar are ending now-->




    <!--features and quality-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 card">
                <p style="font-size: 20px;">
                    <i class="fa-solid fa-check"></i> Quality Product
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card">
                <p style="font-size: 20px;">
                    <i class="fas fa-shipping-fast"></i> Free Shipping
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card">
                <p style="font-size: 20px;">
                    <i class="fas fa-exchange-alt"></i> 7-Day Return
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card">
                <p style="font-size: 20px;">
                    <i class="fa fa-phone"></i> 24/7 Support
                </p>
            </div>
        </div>
    </div>
    <!--Features ended-->




    <!--Prooduct Colection-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend//img/cat-2.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Women's dresses
                        </h5>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend/img/cat-1.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Men's dresses
                        </h5>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend//img/cat-4.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Accessories
                        </h5>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend//img/cat-5.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Bags
                        </h5>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend/img/cat-3.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Baby's dresses
                        </h5>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend/img/cat-4.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Electronics
                        </h5>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend//img/cat-6.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Shoes
                        </h5>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-lg-3 mt-2">

                <div class="card">
                    <div class="card-body">
                        20 Products
                        <div class="product-img">
                            <a href="#"><img onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" src="{{asset('frontend/img/cat-2.jpg')}}" alt="" class="card-img"></a>
                        </div>
                    </div>
                    <div class="card-title">
                        <h5>
                            Ladies Clothes
                        </h5>
                    </div>
                </div>

            </div>
        </div>
    </div>





    

    <!--Season Collection-->
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 col-sm-12">

                <div class="jumbotron" style="background-color: rgb(224, 238, 238); border-radius: 5px;">
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-6">
                                <img src="{{asset('frontend/img/offer-2.png')}}" style="width: 180px; height:auto;" alt="">
                            </div>

                            <div class="col-6 text-center mt-4">
                                <h5> 30% Off on All Product</h5>
                                <h2>Spring Collection</h2>
                                <p><a href="#" class="btn btn-primary">Shop Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6 div.col-sm-12">
                <div class="jumbotron" style="background-color: rgb(224, 238, 238); border-radius: 5px;">
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-6 mt-4 text-center">
                                <h5> 30% Off on All Product</h5>
                                <h2>Winter Collection</h2>
                                <p><a href="#" class="btn btn-primary">Shop Now</a></p>
                            </div>
                            <div class="col-6">
                                <img src="{{asset('frontend/img/offer-1.png')}}" style="width: 140px; height:auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--subscribe us-->
    <div class="container-fluid mt-4" style="background-color: rgb(224, 238, 238);">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12"></div>
                <div class="col-md-8 col-sm-12">
                    <h3 align="center"> ----- Stay Updated ----- </h3>
                    <p align="center">necessitatibus magnam asperiores harum voluptatum officia perferendis. Repellendus odit odio aliquam impedit libero, nihil quaerat nesciunt illum in dolore atque maxime illo culpa consectetu !</p>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="subscribe" class="form-control" placeholder="Write Your email">
                            <span class="input-group-text">
                                <a href="#" class="btn btn-danger">Subscribe</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12"></div>
            </div>
        </div>
    </div>








    <!--trandy products-->
    <div class="container mt-5">
        <h3 align="center"> ---Popular Products--- </h3>
        <div class="row mt-4">
            
           @foreach ($products as $product)

           <div class="col-md-6 col-lg-3 col-sm-12">
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