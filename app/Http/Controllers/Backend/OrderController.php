<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Mail;
use App\Mail\Order\OrderReceivedMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(5);
        return view('backend.order.index', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order->status == 'Accepted') {
            $order->status = 'Pending';
            $order->save();
            Mail::to($order->email)->send(new OrderReceivedMail($order));
            if (Mail::failures()) {
                $request->session()->forget('cart');
                return back()->with('successMessage', 'Order status Updated successfully. Mail Error!');
            } else {
                $request->session()->forget('cart');
                return back()->with('successMessage', 'Order status Updated successfully. Mail Successful');
            }
            
        } else {
            $order->status = 'Accepted';
            // dd($order->status);
            $order->save();
            Mail::to($order->email)->send(new OrderReceivedMail($order));
            if (Mail::failures()) {
                $request->session()->forget('cart');
                return back()->with('successMessage', 'Order status Updated successfully. Mail Error!');
            } else {
                $request->session()->forget('cart');
                return back()->with('successMessage', 'Order status Updated successfully. Mail Successful');
            }
        }
    }
    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back()->with('successMessage', 'Order Deleted successfully.');
    }
}
