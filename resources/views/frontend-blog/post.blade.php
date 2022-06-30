@extends('frontend.layouts.app')

@section('content')


<body>


    <!-- Page Header-->

    <header class="masthead" style="background-image: url( {{asset( 'uploads/blog/thumbnail'.$blog->image) }} )">

        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">


                        <h1>{{$blog->title}}</h1>


                        <h2 class="subheading">{{$blog->summary}}</h2>
                        <span class="meta">


                            Posted by


                            <a href="#!">Start Bootstrap</a>


                            on {{$blog->created_at->format('M, d Y')}}



                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>
                        {!! $blog->content !!}
                    </p>
                </div>
            </div>
        </div>
    </article>
   
@endsection

