<?php

namespace App\Http\Controllers;

use App\Order;
use App\Sales;
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
        // foreach($orders as $ord){
        //     $getPrd = Product::where('id',$ord->product_id)->first();
        //     dump($getPrd->name);
        // }

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

            'product_id' => 'required',
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
        $ord->product_id = $request->input('product_id');
        $ord->customer_name = $request->input('customer_name');
        $ord->address = $request->input('address');
        $ord->phone = $request->input('phone');
        $ord->qty = $request->input('qty');
        $ord->eta = $request->input('eta');
        $ord->status_id = $request->input('status');

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
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ord = Order::find($id);
        $ord->customer_name = $request->input('name') ? $request->input('name') : $ord->customer_name;
        $ord->product_id = $request->input('product_id') ? (int)$request->input('product_id') : $ord->product_name;
        if($request->input('qty') != null){
            $prd = Product::find($ord->product->id);
            if($ord->qty > $request->input('qty')){
                $prd->qty += ($ord->qty - $request->input('qty'));
                $prd->save();
            }elseif($ord->qty < $request->input('qty')){
                $prd->qty += ($ord->qty - $request->input('qty'));
                $prd->save();
            }
        }
        $ord->qty = $request->input('qty') ? $request->input('qty') : $ord->qty;
        $ord->eta = $request->input('eta') ? $request->input('eta') : $ord->eta;
        if($request->input('status') != null){
                $ord->status_id = (int)$request->input('status');
        }
        $ord->phone = $request->input('phone') ? $request->input('phone') : $ord->phone;
        $ord->address = $request->input('address') ? $request->input('address') : $ord->address;

        $ord->save();


        $sale = new Sales;

        $sale->order_id = $ord->id;
        $sale->name = $ord->customer_name;
        $sale->product = $ord->product->name;
        $sale->address = $ord->address;
        $sale->qty = $ord->qty;
        $sale->total_price = $ord->qty * $ord->product->price + $request->input('delivery');
        $sale->phone = $ord->phone;

        $sale->save();

        return response()->json(array('data'=>$ord,));
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
        return redirect()->back();
    }
}
