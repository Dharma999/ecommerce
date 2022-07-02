
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/my.css')}}">

</head>

<body>

    <!--small & new nav for me-->
    <nav class="navbar navbar-expand my-nav1 fixed-top">
        <ul class="navbar-nav ms-4">
            <li class="nav-item">
                <a href="#" class="nav-link">FAQS</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Help</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">


            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 input-group search-my">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </form>
            </li>
        </ul>


        <ul class="navbar-nav ms-auto me-4">
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
                        <i class="fas fa-shopping-cart"> {{Cart::count()}} </i>
                    </a>
                </li>
            </ul>
            <li class="nav-item">
                <a href="#" class="nav-link"> <i class="fab fa-facebook"></i></a>
            </li>
            <li class="nav-item">
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fab fa-instagram"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fab fa-youtube"></i></a>
            </li>
        </ul>
    </nav>


    <div class="container" style="margin-top: 50px;">
        <div>
            <nav class="navbar navbar-expand-lg bg-light my-nav">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">My Shopping Maul   </a>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('frontend.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend.shop')}}">Shop Now</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>






<main>
    
    @yield('content')

</main>





    
    <!--footer are all here-->
    <div class="container-fluid mt-4" style="background-color: rgb(224, 238, 238);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <h3>
                        My Shopping Maul
                    </h3>
                    <p> fuga commodi ea animi officiis itaque mollitia dolor ut minima sequi reprehenderit repudiandae amet dolorum natus deleniti obcaecati, aperiam debitis.</p>
                    <ul>
                        <li style="list-style: none;"> <i class="fa fa-location"></i> Street3, Ktm Nepal</li>
                        <li style="list-style: none;"> <i class="fa-solid fa-envelope"></i> 123@gmail.com</li>
                        <li style="list-style: none;"><i class="fa fa-phone"></i> +977 981165####</li>
                        <li style="list-style: none;"></li>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 my-footer">

                    <h4>
                        Quick Links
                    </h4>
                    <ul>
                        <li> <i class="fas fa-hand-point-right"></i>
                            <a href="#"> Home </a>
                        </li>
                        <li> <i class="fas fa-hand-point-right"></i> <a href="#"> Our Shop </a></li>
                        <li style="list-style: none;"> <i class="fas fa-hand-point-right"></i> <a href="#"> Shop Details </a></li>
                        <li> <i class="fas fa-hand-point-right"></i><a href="#"> Shopping Cart </a> </li>
                        <li> <i class="fas fa-hand-point-right"></i> <a href="#"> Checkout </a></li>
                        <li> <i class="fas fa-hand-point-right"></i> <a href="#"> Contact us </a> </li>
                    </ul>


                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 my-footer">
                    <h4>
                        Quick Links
                    </h4>
                    <ul>
                        <li> <i class="fas fa-hand-point-right"></i>
                            <a href="#"> Home </a>
                        </li>
                        <li> <i class="fas fa-hand-point-right"></i> <a href="#"> Our Shop </a></li>
                        <li style="list-style: none;"> <i class="fas fa-hand-point-right"></i> <a href="#"> Shop Details </a></li>
                        <li> <i class="fas fa-hand-point-right"></i><a href="#"> Shopping Cart </a> </li>
                        <li> <i class="fas fa-hand-point-right"></i> <a href="#"> Checkout </a></li>
                        <li> <i class="fas fa-hand-point-right"></i> <a href="#"> Contact us </a> </li>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h3>News Letter</h3>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control mt-4" placeholder="Your Name">
                        <input type="text" name="email" class="form-control mt-4" placeholder="Your Email">

                        <button type="submit" class="btn btn-danger mt-4 form-control">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: rgb(224, 238, 238);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    Copyright reserved by @Dharma Raj Chaudhary <br> Distributed by Raj IQ Tech
                </div>
                <div class="col-md-6 col-sm-12 text-center">
                    We Accept -><img src="assets/img/payments.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <!--script goes here-->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('frontend/js/my-script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::render() !!}

</body>

</html>