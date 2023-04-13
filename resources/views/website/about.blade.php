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
                <li class="nav-item active"><a href="{{ route('website.about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('website.menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="{{ route('website.blog') }}" class="nav-link">Stories</a></li>
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
                <h1 class="mb-2 bread">About</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('website.home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About <i class="ion-ios-arrow-forward"></i></span></p>
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
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
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
                <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
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
                        <!-- <p>A small river named Duden flows by their place and supplies</p> -->
                        <div class="faded">
                            <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
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
                        <!-- <p>A small river named Duden flows by their place and supplies</p> -->
                        <div class="faded">
                            <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
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
                        <!-- <p>A small river named Duden flows by their place and supplies</p> -->
                        <div class="faded">
                            <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
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
                        <!-- <p>A small river named Duden flows by their place and supplies</p> -->
                        <div class="faded">
                            <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
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

@endsection