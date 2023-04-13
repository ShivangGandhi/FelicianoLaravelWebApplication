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
                <li class="nav-item"><a href="{{ route('website.blog') }}" class="nav-link">Stories</a></li>
                <li class="nav-item active"><a href="{{ route('website.contact') }}" class="nav-link">Contact</a></li>
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
                <h1 class="mb-2 bread">Contact</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('website.home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact us <i class="ion-ios-arrow-forward"></i></span></p>
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

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <form action="{{route('website.contact.store')}}" method="post">
            @csrf
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
                    <h2 class="h4 mb-2 mb-md-5 font-weight-bold">Contact Us</h2>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject">
                        </div>
                        <div class="form-group">
                            <textarea id="" cols="30" rows="7" class="form-control" placeholder="Message" name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <!-- <div id="map"> -->
                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.94162849782!2d72.82516401473168!3d19.197751687018133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b7c24db49add%3A0x973ee0458244da44!2sAtharva%20College%20Of%20Engineering!5e0!3m2!1sen!2sin!4v1606976187303!5m2!1sen!2sin" width="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                    </iframe>
                    <!-- </div> -->
                </div>
            </div>
        </form>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4 font-weight-bold">Contact Information</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Address: </span>Borivali West</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Phone:</span> <a href="tel://1234567920">+91 9999999999</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">feliciano@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="dbox">
                    <p><span>Website:</span> <a href="{{ route('website.home') }}">feliciano.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection