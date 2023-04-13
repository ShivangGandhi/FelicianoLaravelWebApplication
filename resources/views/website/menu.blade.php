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
                <li class="nav-item"><a href="{{ route('website.home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('website.about') }}" class="nav-link">About</a></li>
                <li class="nav-item active"><a href="{{ route('website.menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="{{ route('website.blog') }}" class="nav-link">Stories</a></li>
                <li class="nav-item"><a href="{{ route('website.contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item cta"><a href="{{ route('website.cart') }}" class="nav-link">Cart</a></li>
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
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('website.home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
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

<section class="ftco-section">
    <div class="container">
        <div class="ftco-search">
            <div class="row">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Breakfast</a>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                @foreach($menus as $menu)
                                @if($menu->type == "Breakfast")
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
                                                        <span class="price">Rs {{ $menu->price }}</span>
                                                    </div>
                                                </div>
                                                <p><span>{{ $menu->description }}</span></p>
                                                <p><a href="{{ url('cart/'.$menu->id) }}" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="true">Lunch</a>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                @foreach($menus as $menu)
                                @if($menu->type == "Lunch")
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
                                                        <span class="price">Rs {{ $menu->price }}</span>
                                                    </div>
                                                </div>
                                                <p><span>{{ $menu->description }}</span></p>
                                                <p><a href="{{ url('cart/'.$menu->id) }}" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="true">Dinner</a>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-3" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                @foreach($menus as $menu)
                                @if($menu->type == "Dinner")
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
                                                        <span class="price">Rs {{ $menu->price }}</span>
                                                    </div>
                                                </div>
                                                <p><span>{{ $menu->description }}</span></p>
                                                <p><a href="{{ url('cart/'.$menu->id) }}" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="true">Drinks</a>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-4" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                @foreach($menus as $menu)
                                @if($menu->type == "Drinks")
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
                                                        <span class="price">Rs {{ $menu->price }}</span>
                                                    </div>
                                                </div>
                                                <p><span>{{ $menu->description }}</span></p>
                                                <p><a href="{{ url('cart/'.$menu->id) }}" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="true">Desserts</a>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-5" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                @foreach($menus as $menu)
                                @if($menu->type == "Deserts")
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
                                                        <span class="price">Rs {{ $menu->price }}</span>
                                                    </div>
                                                </div>
                                                <p><span>{{ $menu->description }}</span></p>
                                                <p><a href="{{ url('cart/'.$menu->id) }}" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection