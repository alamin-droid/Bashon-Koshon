<?php

namespace App\Http\Controllers\Admin;

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
        $purchases = Purchase::orderBy('id', 'DESC')->get();
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        return view('purchase.index', compact('purchases', 'materials', 'suppliers'));
    }

    public function create()
    {
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        return view('purchase.create', compact('materials', 'suppliers'));
    }

    public function store(Request $request)
    {
        Purchase::create([
           'date'=>$request->date,
           'rawmaterial_id'=>json_encode($request->materials),
           'quantity'=>json_encode($request->quantity),
           'unit'=>json_encode($request->unit),
           'rate_per_unit'=>json_encode($request->rate),
           'supplier_id'=>json_encode($request->supplier),
           'warehouse_id'=>'2',
           'status'=>'pending',
        ]);
        Session::flash('success', 'Raw material purchased successfully');
        return redirect()->route('purchase.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = Purchase::find($id);
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        return view('purchase.edit', compact('edit', 'materials', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);
        $purchase->update([
            'date'=>$request->date,
            'rawmaterial_id'=>json_encode($request->materials),
            'quantity'=>json_encode($request->quantity),
            'unit'=>json_encode($request->unit),
            'rate_per_unit'=>json_encode($request->rate),
            'supplier_id'=>json_encode($request->supplier),
            'warehouse_id'=>'2',
            'status'=>'pending',
        ]);
        Session::flash('success', 'Raw material purchase updated successfully');
        return redirect()->route('purchase.index');
    }

    public function destroy($id)
    {
        Purchase::find($id)->delete();
        return redirect()->back();
    }
}
