<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\Order\OrderReceivedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Menu;
use App\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
	public function cart()
	{
		return view('website.cart');
	}

	public function addToCart($id)
	{
		$item = Menu::find($id);
		if (!$item) {
			abort(404);
		}
		$cart = session()->get('cart');
		// if cart is empty then this the first product
		if (!$cart) {
			$cart = [
				$id => [
					"id" => $item->id,
					"name" => $item->name,
					"quantity" => 1,
					"price" => $item->price,
					"image" => $item->image,
					"description" => $item->description,
					"type" => $item->type
				]
			];
			session()->put('cart', $cart);
			return redirect()->back()->with('successMessage', 'Cart Created. Product added to cart successfully!');
		}
		// if cart not empty then check if this product exist then increment quantity
		if (isset($cart[$id])) {
			$cart[$id]['quantity']++;
			session()->put('cart', $cart);
			// dd($cart);
			return redirect()->back()->with('successMessage', 'Product added to cart successfully!. Quantity Updated Successfully');
		}
		// if item not exist in cart then add to cart with quantity = 1
		$cart[$id] = [
			"id" => $item->id,
			"name" => $item->name,
			"quantity" => 1,
			"price" => $item->price,
			"image" => $item->image,
			"description" => $item->description,
			"type" => $item->type
		];
		session()->put('cart', $cart);
		// dd($cart);
		return redirect()->back()->with('successMessage', 'Product added to cart successfully!');
	}

	public function update(Request $request)
	{
		if ($request->id and $request->quantity) {
			$cart = session()->get('cart');
			if (isset($cart[$request->id])) {
				$cart[$request->id]["quantity"] = $request->quantity;
				session()->put('cart', $cart);
				session()->flash('successMessage', 'Cart updated successfully');
			}
		}
	}
	public function remove(Request $request)
	{
		if ($request->id) {
			$cart = session()->get('cart');
			if (isset($cart[$request->id])) {
				unset($cart[$request->id]);
				session()->put('cart', $cart);
			}
			session()->flash('successMessage', 'Product removed successfully');
		}
	}

	public function clear(Request $request)
	{
		// dd($request);
		$request->session()->forget('cart');
		// dd($request->session());
		return redirect(route('website.menu'))->with('successMessage', 'Cart Deleted successfully.');
	}

	public function checkout(Request $request)
	{
		$this->validate(request(), [
			'order' => 'required|min:3',
			'name' => 'required|min:5|max:20',
			'phone' => 'required|digits:10|numeric',
			'email' => 'required|email:rfc,dns',
			'address' => 'required|min:10|max:100',
			'pincode' => 'required|digits:6|numeric',
		]);
		$date = date('Y-m-d', strtotime(Carbon::today()));
		$time = date('h:i:s', strtotime(Carbon::now()));
		$order = new Order();
		$order->date = date('Y-m-d', strtotime(Carbon::today()));
		$order->time = date('h:i:s', strtotime(Carbon::now()));
		$order->name = $request->name;
		$order->phone = $request->phone;
		$order->email = $request->email;
		$order->address = $request->address;
		$order->pincode = $request->pincode;
		$order->suggestion = $request->suggestion;
		$order->order = $request->order;
		$order->total = $request->total;
		$order->save();
		$order->id = $order->id;
		$order->payment_status = $order->payment_status;
		$order->status = 'Pending';
		Mail::to($order->email)->send(new OrderReceivedMail($order));
		if (Mail::failures()) {
			$request->session()->forget('cart');
			return redirect(route('website.home'))->with('successMessage', 'Check Email. Order Placed Successfully');
		} else {
			$request->session()->forget('cart');
			return redirect(route('website.home'))->with('successMessage', 'Check Email. Order Placed Successfully');
		}
	}
}
