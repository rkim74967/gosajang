<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Sales;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        $order = Order::all();
        $total_price = Sales::sum('total_price');
        return view('home',compact('product','order','total_price'));
    }
}
