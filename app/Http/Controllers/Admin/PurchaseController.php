<?php

namespace App\Http\Controllers\Admin;

use App\Finishedgood;
use App\Http\Controllers\Controller;
use App\Purchase;
use App\Rawmaterial;
use App\Supplier;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{

    public function index()
    {
        $purchases = Purchase::orderBy('id', 'DESC')->paginate(30);
        return view('purchase.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        $finished_goods = Finishedgood::orderBy('id', 'DESC')->get();
        return view('purchase.create', compact( 'suppliers', 'finished_goods'));
    }

    public function store(Request $request)
    {
        Purchase::create([
           'date'=>$request->date,
           'supplier_id'=>$request->supplier_id,
           'product'=>$request->product,
           'bag'=>$request->bag,
           'quantity'=>$request->quantity,
           'unit_price'=>$request->unit_price,
           'total_price'=>$request->total_price,
           'bag_price'=>$request->bag_price,
           'total_bag_price'=>$request->total_bag_price,
           'extra_expense'=>$request->extra_expense,
           'total'=>$request->total,
        ]);
        Session::flash('success', 'Purchased successfully');
        return redirect()->route('purchase.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = Purchase::find($id);
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        $finished_goods = Finishedgood::orderBy('id', 'DESC')->get();
        return view('purchase.edit', compact('edit', 'suppliers', 'finished_goods'));
    }

    public function update(Request $request, $id)
    {
        $update = Purchase::find($id);
        $update->update([
            'date'=>$request->date,
            'supplier_id'=>$request->supplier_id,
            'product'=>$request->product,
            'bag'=>$request->bag,
            'quantity'=>$request->quantity,
            'unit_price'=>$request->unit_price,
            'total_price'=>$request->total_price,
            'bag_price'=>$request->bag_price,
            'total_bag_price'=>$request->total_bag_price,
            'extra_expense'=>$request->extra_expense,
            'total'=>$request->total,
        ]);
        Session::flash('success', 'Purchase updated successfully');
        return redirect()->route('purchase.index');
    }

    public function destroy($id)
    {
        Purchase::find($id)->delete();
        return redirect()->back();
    }
}
