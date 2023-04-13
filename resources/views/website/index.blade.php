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
                <li class="nav-item cta"><a href="{{ route('website.reservation') }}" class="nav-link">Book a table</a></li>
                <li class="nav-item active"><a href="{{ route('website.home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('website.about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('website.menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="{{ route('website.blog') }}" class="nav-link">Stories</a></li>
                <li class="nav-item"><a href="{{ route('website.contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item cta"><a href="{{ route('website.menu') }}" class="nav-link">Order Now</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<section class="home-slider owl-carousel js-fullheight">
    <div class="slider-item js-fullheight" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="false">

                <div class="col-md-12 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Feliciano</span>
                    <h1 class="mb-4">Best Restaurant</h1>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item js-fullheight" style="background-image: url(images/bg_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-12 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Feliciano</span>
                    <h1 class="mb-4">Nutritious &amp; Tasty</h1>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item js-fullheight" style="background-image: url(images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-12 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Feliciano</span>
                    <h1 class="mb-4">Delicious Specialties</h1>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="featured">
                    <div class="row">
                        @foreach( $menus1 as $menu )
                        <div class="col-md-3">
                            <div class="featured-menus ftco-animate">
                                <div class="menu-img img" style="background-image: url({{ asset('images/'.$menu->image) }});"></div>
                                <div class="text text-center">
                                    <h3>{{ $menu->name }}</h3>
                                    <!-- <p><span>{{ $menu->description }}</span></p> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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

<section class="ftco-section ftco-wrap-about">
    <div class="container">
        <div class="row">
            <div class="col-md-7 d-flex">
                <div class="img img-1 mr-md-2" style="background-image: url(images/about.jpg);"></div>
                <div class="img img-2 ml-md-2" style="background-image: url(images/about-1.jpg);"></div>
            </div>
            <div class="col-md-5 wrap-about pt-5 pt-md-5 pb-md-3 ftco-animate">
                <div class="heading-section mb-4 my-5 my-md-0">
                    <span class="subheading">About</span>
                    <h2 class="mb-4">Feliciano Restaurant</h2>
                </div>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                <pc class="time">
                    <span>Mon - Fri <strong>8 AM - 11 PM</strong></span>
                    <span><a href="#">+91 9999999999</a></span>
                    </p>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter">
    <div class="container">
        <div class="row d-md-flex">
            <div class="col-md-12">
                <div class="row d-md-flex align-items-center">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="18">0</strong>
                                <span>Years of Experienced</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Menus/Dish</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="50">0</strong>
                                <span>Staffs</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="15000">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center text-md-left">
                <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelia.</p> -->
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-4">Catering Services</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                <div class="media block-6 services d-block">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-cake"></span>
                    </div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Birthday Party</h3>
                        <!-- <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                <div class="media block-6 services d-block">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-meeting"></span>
                    </div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Business Meetings</h3>
                        <!-- <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                <div class="media block-6 services d-block">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-tray"></span>
                    </div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Wedding Party</h3>
                        <!-- <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-2">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <span class="subheading" id="hehe">Specialties</span>
                <a href="{{ route('website.menu') }}">
                    <h2 class="mb-4">Our Menu</h2>
                </a>
            </div>
        </div>
        <div class="row no-gutters d-flex align-items-stretch">
            @foreach( $menus2 as $menu )
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                <div class="menus d-sm-flex ftco-animate align-items-stretch">
                    <div class="menu-img img" style="background-image: url({{ asset('images/'.$menu->image) }});"></div>
                    <div class="text d-flex align-items-center">
                        <div>
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>{{ $menu->name }}</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">{{ $menu->price }}</span>
                                </div>
                            </div>
                            <p><span>{{ $menu->description }}</span></p>
                            <!-- <p><a href="#" class="btn btn-primary">Order now</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <span class="subheading">Chef</span>
                <h2 class="mb-4">Our Master Chef</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img" style="background-image: url(images/chef-4.jpg);"></div>
                    <div class="text pt-4">
                        <h3>John Smooth</h3>
                        <span class="position mb-2">Restaurant Owner</span>
                        <div class="faded">
                            <!-- <ul class="ftco-social d-flex">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img" style="background-image: url(images/chef-2.jpg);"></div>
                    <div class="text pt-4">
                        <h3>Rebeca Welson</h3>
                        <span class="position mb-2">Head Chef</span>
                        <div class="faded">
                            <!-- <ul class="ftco-social d-flex">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img" style="background-image: url(images/chef-3.jpg);"></div>
                    <div class="text pt-4">
                        <h3>Kharl Branyt</h3>
                        <span class="position mb-2">Chef</span>
                        <div class="faded">
                            <!-- <ul class="ftco-social d-flex">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img" style="background-image: url(images/chef-1.jpg);"></div>
                    <div class="text pt-4">
                        <h3>Luke Simon</h3>
                        <span class="position mb-2">Chef</span>
                        <div class="faded">
                            <!-- <ul class="ftco-social d-flex">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <span class="subheading">Vision</span>
                <h2 class="mb-4">Our Owners</h2>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap text-center pb-5">
                            <div class="user-img mb-4" style="background-image: url(images/bhavya.jpeg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text p-3">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Bhavya</p>
                                <span class="position">Owner</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center pb-5">
                            <div class="user-img mb-4" style="background-image: url(images/shivang.jpeg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text p-3">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Shivangkumar</p>
                                <span class="position">Owner</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap text-center pb-5">
                            <div class="user-img mb-4" style="background-image: url(images/ravi.jpeg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text p-3">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Ravikumar</p>
                                <span class="position">Owner</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Blog</span>
                <!-- <h2 class="mb-4">Recent Posts</h2> -->
                <a href="{{ route('website.blog') }}">
                    <h2 class="mb-4">Recent Posts</h2>
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{ asset('images/'.$blog->image) }});">
                    </a>
                    <div class="text pt-3 pb-4 px-4">
                        <div class="meta">
                            <div><a href="#">Sept. 06, 2019</a></div>
                            <div><a href="#">Admin</a></div>
                        </div>
                        <h3 class="heading"><a href="#">{{ $blog->title }}</a></h3>
                        <p class="clearfix">
                            <a href="{{ route('website.blogsingle',$blog->id) }}" class="float-left read">Read more</a>
                            <!-- <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a> -->
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection