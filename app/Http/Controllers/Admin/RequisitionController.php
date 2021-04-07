<?php

namespace App\Http\Controllers\Admin;

use App\Factory;
use App\Http\Controllers\Controller;
use App\ProductonRequest;
use App\Requisition;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RequisitionController extends Controller
{

    public function index()
    {
        $requisitions = Requisition::orderBy('id', 'DESC')->get();
        return view('requisition.index', compact('requisitions'));
    }

    public function create()
    {
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        $factories = Factory::orderBy('id', 'DESC')->get();
        return view('requisition.create', compact('factories', 'warehouses'));
    }

    public function store(Request $request)
    {
        Requisition::create([
           'date'=>$request->date,
           'factory_id'=>$request->factory_id,
           'product_request_id'=>$request->production_request_id,
           'items'=>json_encode($request->item),
           'quantity'=>json_encode($request->quantity),
            'status'=>'pending',
        ]);
        Session::flash('success', 'Requisition created successfully');
        return redirect()->back();
    }

    public function show($id)
    {
        $requisition = Requisition::find($id);
        return view('requisition.show', compact('requisition'));
    }

    public function edit($id)
    {
        $requisition = Requisition::find($id);
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        return view('requisition.edit', compact('requisition', 'warehouses'));
    }

    public function update(Request $request, $id)
    {
        $requisition = Requisition::find($id);
        $requisition->update([
            'date'=>$request->date,
            'factory_id'=>$request->factory_id,
            'product_request_id'=>$request->production_request_id,
            'warehouse_id'=>$request->warehouse_id,
            'items'=>json_encode($request->item),
            'quantity'=>json_encode($request->quantity),
            'status'=>'pending',
        ]);
        Session::flash('success', 'Requisition Updated successfully');
        return redirect()->route('requisition.index');
    }

    public function destroy($id)
    {
        Requisition::find($id)->delete();
        Session::flash('success', 'Requisition Deleted Successfully');
        return redirect()->back();
    }
    public function production_create($id){
        $request = ProductonRequest::find($id);
        return view('requisition.product_requisition', compact('request'));
    }
    public function production_request($id){
        $production_requests = ProductonRequest::where('factory_id', $id)->get();
        return response()->json($production_requests);
    }
}
