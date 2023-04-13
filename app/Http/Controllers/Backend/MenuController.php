<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function index()
    {
		$menus = Menu::paginate(5);
    	return view('backend.menu.index',compact('menus'));
    }
    public function create()
    {
    	return view('backend.menu.create');
    }
    public function store(Request $request)
    {
        // dd($request);
    	$this->validate(request(),[
        		'name'    =>'required|max:50',
        		'description'  =>'required',
        		'price'  =>'required',
        		'type'  =>'required',
        ]);
        $filenamewithextension = $request->image->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
		$extension = $request->file('image')->getClientOriginalExtension();
		$filenametostore = $request->file('image')->storeAs('', $filename.'.'.$extension);
        $menu = new Menu();
    	$menu->name = $request->name;
    	$menu->description = $request->description;
    	$menu->price = $request->price;
    	$menu->type = $request->type;
    	$menu->image = $filenametostore;
    	$menu->save();
    	return redirect(route('admin.menu'))->with('successMessage','Menu Item Added successfully.');

    }
    public function edit(Request $request, $id)
    {
    	$menu = Menu::find($id);
    	return view('backend.menu.edit',compact('menu'));
    }
    public function update(Request $request, $id)
    {
    	$this->validate(request(),[
        		'name'    =>'required|max:50',
        		'description'  =>'required',
        		'price'  =>'required',
        		'type'  =>'required',
        ]);
        if($request->has('image')){	
	        $filenamewithextension = $request->image->getClientOriginalName();
	        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
	        $extension = $request->file('image')->getClientOriginalExtension();
	        $filenametostore = $request->file('image')->storeAs('', $filename.'.'.$extension);
	        $menu = Menu::find($id);
	    	$menu->name = $request->name;
	    	$menu->description = $request->description;
	    	$menu->price = $request->price;
	    	$menu->type = $request->type;
	    	$menu->image = $filenametostore;
	    	$menu->save();
        }else{
        	$menu = Menu::find($id);
	    	$menu->name = $request->name;
	    	$menu->description = $request->description;
	    	$menu->price = $request->price;
	    	$menu->type = $request->type;
	    	$menu->save();
        }
    	return redirect(route('admin.menu'))->with('successMessage','Menu Item Updated successfully.');
    }
    public function delete($id)
    {
    	$menu = Menu::find($id);
    	$menu->delete();
    	return redirect(route('admin.menu'))->with('successMessage','Menu Item Deleted successfully.');

    }
}
