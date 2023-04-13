<?php

use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\ReservationController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\OrderController;
use Tabuna\Breadcrumbs\Trail;

Route::get('/', [WebsiteController::class, 'home'])
    ->name('home');

Route::get('/about', [WebsiteController::class, 'about'])
    ->name('about');

Route::get('/menu', [WebsiteController::class, 'menu'])
    ->name('menu');

Route::get('/blog', [WebsiteController::class, 'blog'])
    ->name('blog');

Route::get('blog/{id}/edit', [WebsiteController::class, 'blogsingle'])
    ->name('blogsingle');

Route::get('/contact', [WebsiteController::class, 'contact'])
    ->name('contact');

Route::get('/reservation', [WebsiteController::class, 'reservation'])
    ->name('reservation');

//Reservation
Route::post('reservation/store', [ReservationController::class, 'store'])
    ->name('reservation.store');

//Contact
Route::post('contact/store', [ContactController::class, 'store'])
    ->name('contact.store');

//Newletter
Route::get('newsletter', 'NewsletterController@index')
    ->name('newsletter');

Route::post('newsletter/store', 'NewsletterController@store')
    ->name('newsletter.store');

//Order
Route::get('/cart', [OrderController::class, 'cart'])
    ->name('cart');

Route::get('cart/{id}', [OrderController::class, 'addToCart']);

Route::patch('update-cart', [OrderController::class, 'update']);

Route::delete('remove-from-cart', [OrderController::class, 'remove']);

Route::delete('clear-cart', [OrderController::class, 'clear'])
    ->name('cart.delete');

Route::post('/checkout', [OrderController::class, 'checkout'])
    ->name('order.checkout');

Route::post('order/store', [OrderController::class, 'store'])
    ->name('order.store');
