<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Blog;
use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $menus = Menu::all()->take(6);
        $blogs = Blog::all()->take(3);
        return view('website.index', compact('menus','blogs'));
    }

    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribePending($request->email);
            return back()->with('successMessage', 'Thanks For Subscribing. Check Email');
        }
        else{
            return back()->with('errorMessage', 'Sorry! You have already subscribed ');
        }
    }
}
