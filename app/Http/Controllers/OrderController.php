<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::paginate(10) ?? null;
        $products = Product::all() ?? null;

        return view('order.order',compact('orders','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

            'product_name' => 'required',
            'customer_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'eta' => 'required',

        ]);

        $product = Product::where('name',$request->input('product_name'))->first();
        if($product->qty - $request->input('qty') < 0){
            return redirect()->back()->with('error','주문수량 한도 초과입니다.');
        }
        $product->qty -= $request->input('qty');
        $product->save();


        $ord = new Order;
        $ord->product_name = $request->input('product_name');
        $ord->customer_name = $request->input('customer_name');
        $ord->address = $request->input('address');
        $ord->phone = $request->input('phone');
        $ord->qty = $request->input('qty');
        $ord->eta = $request->input('eta');
        $ord->status = $request->input('status');

        $ord->save();

        return redirect()->back()->with('message','저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Order $order)
    {
        //
        $ord = Order::where('id',$order->id)->first();
        $ord->customer_name = $request->input('customer_name') ? $request->input('customer_name') : $ord->customer_name;
        $ord->product_name = $request->input('product_name') ? $request->input('product_name') : $ord->product_name;
        $ord->qty = $request->input('qty') ? $request->input('qty') : $ord->qty;
        $ord->eta = $request->input('eta') ? $request->input('eta') : $ord->eta;
        $ord->phone = $request->input('phone') ? $request->input('phone') : $ord->phone;
        $ord->address = $request->input('address') ? $request->input('address') : $ord->address;

        $ord->save();

        return redirect()->back()->with('message','저장되었습니다.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('message','삭제되었습니다');
    }
}
