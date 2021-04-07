<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Finishedgood;
use App\Gatepass;
use App\Http\Controllers\Controller;
use App\Sell;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberToWords\NumberToWords;

class SellController extends Controller
{

    public function index()
    {
        $sells = Sell::where('status', 'approved')->orderBy('id', 'DESC')->paginate(10);
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        return view('sell.index', compact('sells', 'finishedgoods'));
    }

    public function create()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        return view('sell.create', compact('clients', 'finishedgoods', 'warehouses'));
    }

    public function store(Request $request)
    {
        Sell::create([
           'date'=>$request->date,
           'client_id'=>$request->client_id,
           'retail_sell'=>$request->retail_sell,
           'finishedgood_id'=>json_encode($request->finishedgood_id),
           'quantity'=>json_encode($request->quantity),
           'rate_per_unit'=>json_encode($request->rate_per_unit),
           'status'=>'pending',
           'warehouse_id'=>$request->warehouse_id,
        ]);
        Session::flash('success', 'Sell is created successfully');
        return redirect()->route('sell.index');
    }

    public function show($id)
    {
        $sell = Sell::find($id);
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $gatepass = Gatepass::where('sale_id', $id)->orderBy('id', 'DESC')->first();
        return view('sell.invoice', compact('sell', 'finishedgoods', 'numberTransformer', 'gatepass'));
    }

    public function edit($id)
    {
        $sell = Sell::find($id);
        $clients = Client::orderBy('id', 'DESC')->get();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        return view('sell.edit', compact('sell', 'clients', 'finishedgoods', 'warehouses'));
    }

    public function update(Request $request, $id)
    {
        $sell = Sell::find($id);
        $sell->update([
            'date'=>$request->date,
            'client_id'=>$request->client_id,
            'retail_sell'=>$request->retail_sell,
            'finishedgood_id'=>json_encode($request->finishedgood_id),
            'quantity'=>json_encode($request->quantity),
            'rate_per_unit'=>json_encode($request->rate_per_unit),
            'status'=>'pending',
            'warehouse_id'=>$request->warehouse_id,
        ]);
        Session::flash('success', 'Sell is Updated successfully');
        return redirect()->route('sell.index');
    }

    public function destroy($id)
    {
        Sell::find($id)->delete();
        Session::flash('success', 'Sell is deleted Successfully');
        return redirect()->back();
    }
    public function challan($id)
    {
        $sell = Sell::find($id);
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        $gatepass = Gatepass::where('sale_id', $id)->orderBy('id', 'DESC')->first();
        return view('sell.challan', compact('sell', 'finishedgoods', 'gatepass'));
    }
}
