<?php

namespace App\Http\Controllers;

use App\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales = Sales::paginate(10);

        return view('sale.index')->with('sales',$sales);
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

            'name' => 'required',
            'qty' => 'required',
        ]);

        $sale = new Sales;
        $sale->name = $request->input('name');
        $sale->qty = $request->input('qty');

        $sale->save();

        return redirect()->back()->with('message','저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sales $sale)
    {
        //
        $sale = Sales::where('id',$sale->id)->first();
        $sale->name = $request->input('name') ? $request->input('name') : $sale->name;
        $sale->qty = $request->input('qty') ? $request->input('qty') : $sale->qty;

        $sale->save();

        return redirect()->back()->with('message','저장되었습니다.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sale)
    {

        //
    }

    public function searchDate(Request $request){
        $date = $request->all();
        $data = Sales::whereBetween('created_at',[$request->get('from'),$request->get('to')])->get();

        return response()->json([
            'date'=> $date,
            'data'=> $data,
            ]);
    }
    public function searchBtn(Request $request, $button){
        switch($button){
            case 'today':
                $date = Carbon::now();
                $data = Sales::where('created_at','like','%'.date_format($date,'Y-m-d').'%')->get();
                break;
            case 'yesterday':
                $date = Carbon::now()->subDays(1);
                $data = Sales::where('created_at','like','%'.date_format($date,'Y-m-d').'%')->get();
                break;
            case 'lastweek':
                $start = Carbon::now()->startOfWeek()->subWeek();
                $end = Carbon::now()->endOfWeek()->subWeek();
                $data = Sales::whereBetween('created_at',[date_format($start,'Y-m-d'),date_format($end,'Y-m-d')])->get();

                break;
            case 'thismonth':
                $start = Carbon::now()->startofMonth();
                $end = Carbon::now()->endofMonth();
                $data = Sales::whereBetween('created_at',[date_format($start,'Y-m-d'),date_format($end,'Y-m-d')])->get();
                break;
            case 'lastmonth':
                $start = Carbon::now()->startofMonth()->subMonth();
                $end = Carbon::now()->endofMonth()->subMonth();
                $data = Sales::whereBetween('created_at',[date_format($start,'Y-m-d'),date_format($end,'Y-m-d')])->get();
                break;

        }
        return response()->json([
            'data' => $data,
            ]);
    }
}
