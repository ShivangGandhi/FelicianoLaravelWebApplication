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
            <section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container-fluid px-0">
                    <div class="heading-section ftco-animate ">
                        <span class="subheading">Place your Order</span>
                        <h2 class="mb-4">Cart</h2>
                    </div>
                    <form action="{{route('website.order.checkout')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name" required name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" placeholder="Your Email" required="" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" required="" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pin Code</label>
                                    <input type="text" class="form-control" placeholder="Pin Code" required="" name="pincode">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" required="" placeholder="Enter Your Address Here"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cooking Suggestions</label>
                                    <textarea name="suggestion" class="form-control" placeholder="Enter Your Cooking Suggestions Here"></textarea>
                                </div>
                            </div>



                        </div>
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:52%">Item</th>
                                    <th style="width:8%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:22%" class="text-center subtotal">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                $totalbefore = 0;
                                $tax = 0;
                                $quantity = []; ?>
                                @if(!session('cart'))
                                <tr>
                                    <td colspan="5" class="text-center"><strong>Cart is Empty. </strong>Please Add Items</td>
                                </tr>
                                @else
                                @foreach(session('cart') as $id => $details)
                                <?php
                                $total += $details['price'] * $details['quantity'];
                                array_push($quantity, [$details['name'] => $details['quantity']]);
                                ?>

                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs"><img height="100" width="130" src="{{ asset('images/'.$details['image']) }}" alt="..." class="img-responsive" /></div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">Rs. {{ $details['price'] }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" min=1 class="form-control text-center quantity" value="{{ $details['quantity'] }}">
                                    </td>
                                    <td data-th="Subtotal" class="text-center">Rs. {{ $details['price'] * $details['quantity'] }}</td>

                                    <td class="actions" data-th="">
                                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fas fa-sync-alt"></i></button>
                                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                <input type="text" name="order" value="{{json_encode(($quantity))}}" style="display:none;">
                            </tbody>
                            <tfoot>
                                <tr class="visible-xs">
                                    <?php
                                    $totalbefore = $total;
                                    $tax = 0.18 * $total;
                                    $total = $total + $tax;
                                    ?>
                                    <input type="number" name="total" value="{{ $total }}" style="display:none;">
                                    <!-- <td class="text-center"><strong>Total: Rs. {{ $total }}</strong></td> -->
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <!-- <input type="submit" value='Checkout' class="btn btn-primary py-3 px-5"> -->
                                        <button type="submit" class="btn btn-primary">Checkout <i class="fa fa-angle-right"></i></button>
                    </form>
                    <a href="{{ route('website.menu') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <form method="POST" id="delete-cart" action="{{ route('website.cart.delete') }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                    </form>
                    <button class="btn btn-raised btn-primary cc" onclick="if (confirm('Are you Sure to Clear this Cart? ')){
                            event.preventDefault();
                            document.getElementById('delete-cart').submit();
                            }
                            else{
                            event.preventDefault();
                            }">Clear Cart
                    </button>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center">
                        <strong>Total: </strong> Rs. {{ $totalbefore }}<br>
                        <strong>GST(18%):</strong> Rs. {{ $tax }}<br>
                        <strong>Total: </strong>Rs. {{ $total }}
                    </td>
                    </form>
                    </tr>
                    </tfoot>
                    </table>
                </div>
        </div>
</section>
</div>
</div>
</section>

@endsection