<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ReservationController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ContactController;

use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

//Menu
Route::get('menu', [MenuController::class, 'index'])
    ->name('menu')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::get('menu/create', [MenuController::class, 'create'])
    ->name('menu.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::post('menu/store', [MenuController::class, 'store'])
    ->name('menu.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::get('menu/{id}/edit', [MenuController::class, 'edit'])
    ->name('menu.edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::patch('menu/{id}/update', [MenuController::class, 'update'])
    ->name('menu.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::DELETE('menu/{id}/delete', [MenuController::class, 'delete'])
    ->name('menu.delete')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

//Blogs
Route::get('blog', [BlogController::class, 'index'])
    ->name('blog')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::get('blog/create', [BlogController::class, 'create'])
    ->name('blog.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::post('blog/store', [BlogController::class, 'store'])
    ->name('blog.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::get('blog/{id}/edit', [BlogController::class, 'edit'])
    ->name('blog.edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::patch('blog/{id}/update', [BlogController::class, 'update'])
    ->name('blog.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::DELETE('blog/{id}/delete', [BlogController::class, 'delete'])
    ->name('blog.delete')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

//Reservation
Route::get('reservation', [ReservationController::class, 'index'])
    ->name('reservation')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::get('reservation/{id}/update', [ReservationController::class, 'update'])
    ->name('reservation.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::DELETE('reservation/{id}/delete', [ReservationController::class, 'delete'])
    ->name('reservation.delete')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

//Contact
Route::get('contact', [ContactController::class, 'index'])
    ->name('contact')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::post('ckeditor/image_upload', 'BlogController@upload')->name('upload');

//Order
Route::get('order', [OrderController::class, 'index'])
    ->name('order')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::get('order/{id}/update', [OrderController::class, 'update'])
    ->name('order.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::DELETE('order/{id}/delete', [OrderController::class, 'delete'])
    ->name('order.delete')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });