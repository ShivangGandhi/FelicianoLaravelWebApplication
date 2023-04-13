<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Blog;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $menus1 = Menu::all()->whereIn('type','Deserts')->take(4);
        $menus2 = Menu::all()->whereIn('id', [1, 4, 6, 8, 11, 12]);
        $blogs = Blog::all()->take(3);
        return view('website.index', compact('menus1','menus2','blogs'));
    }

    public function about()
    {
        return view('website.about');
    }

    public function menu()
    {
        $menus = Menu::all();
        return view('website.menu', compact('menus'));
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('website.blog', compact('blogs'));
    }

    public function blogsingle(Request $request, $id)
    {
        $blogs = Blog::find($id);
        // dd($blogs);
        return view('website.blogsingle', compact('blogs'));
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function reservation()
    {
        return view('website.reservation');
    }
}
