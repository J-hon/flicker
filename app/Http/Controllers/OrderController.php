<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->paginate(10);

        return view('user.order')->with('orders', $orders);
    }

    public static function saveOrder($movie, $price)
    {
        $order = new Order();

        $order->movie = $movie;
        $order->price = $price;
        $order->user_id = Auth::user()->id;

        $order->save();
    }
}
