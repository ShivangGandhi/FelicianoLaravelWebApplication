@extends('website.layouts.app')

@section('center')

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website.home') }}">Feliciano</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('website.home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('website.about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('website.menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item active"><a href="{{ route('website.blog') }}" class="nav-link">Stories</a></li>
                <li class="nav-item"><a href="{{ route('website.contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item cta"><a href="{{ route('website.reservation') }}" class="nav-link">Book a table</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_common.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Blog</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('website.home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

@if(session('successMessage'))
<div class="alert alert-success" role="alert">
    {{ session('successMessage') }}
</div>
@endif
@if(session('errorMessage'))
<div class="alert alert-danger" role="alert">
    {{ session('errorMessage') }}
</div>
@endif
@if (count($errors) > 0)
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                    <a href="{{ route('website.blogsingle',$blog->id) }}" class="block-20" style="background-image: url({{ asset('images/'.$blog->image) }});">
                    </a>
                    <div class="text pt-3 pb-4 px-4">
                        <div class="meta">
                            <!-- <div><a href="#">Sept. 06, 2019</a></div> -->
                            <div><a href="{{ route('website.blogsingle',$blog->id) }}">{{ date('M. d, Y', strtotime($blog->date)) }}</a></div>
                            <div><a href="{{ route('website.blogsingle',$blog->id) }}">Admin</a></div>
                        </div>
                        <h3 class="heading"><a href="{{ route('website.blogsingle',$blog->id) }}">{{ $blog->title }}</a></h3>
                        <p class="clearfix">
                            <a href="{{ route('website.blogsingle',$blog->id) }}" class="float-left read">Read more</a>
                            <!-- <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a> -->
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="row no-gutters my-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
</section>

@endsection