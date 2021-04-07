<?php

namespace App\Http\Controllers\Admin;

use App\Finishedgood;
use App\Http\Controllers\Controller;
use App\Production;
use App\Rawmaterial;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::orderBy('id', 'DESC')->paginate(10);
        $rawmaterials = Rawmaterial::orderBy('id', 'DESC')->get();
        return view('production.index', compact('productions', 'rawmaterials'));
    }

    public function create()
    {
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        $rawmaterials = Rawmaterial::orderBy('id', 'DESC')->get();
        return view('production.create', compact('warehouses', 'finishedgoods', 'rawmaterials'));
    }

    public function store(Request $request)
    {
        Production::create([
           'date'=>$request->date,
           'finishedgood_id'=>$request->finishedgood_id,
           'finishedgood_quantity'=>$request->finishedgood_quantity,
           'rawmaterials_id'=>json_encode($request->rawmaterials_id),
           'rawmaterials_quantity'=>json_encode($request->rawmaterials_quantity),
           'rawmaterials_unit'=>json_encode($request->unit),
           'warehouse_id'=>$request->warehouse_id,
           'status'=>'pending',
        ]);
        Session::flash('success', 'Production Created Successfully');
        return redirect()->route('production.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $production = Production::find($id);
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        $rawmaterials = Rawmaterial::orderBy('id', 'DESC')->get();
        return view('production.edit', compact('production', 'warehouses', 'finishedgoods', 'rawmaterials'));
    }

    public function update(Request $request, $id)
    {
        $production = Production::find($id);
        $production->update([
            'date'=>$request->date,
            'finishedgood_id'=>$request->finishedgood_id,
            'finishedgood_quantity'=>$request->finishedgood_quantity,
            'rawmaterials_id'=>json_encode($request->rawmaterials_id),
            'rawmaterials_quantity'=>json_encode($request->rawmaterials_quantity),
            'rawmaterials_unit'=>json_encode($request->unit),
            'warehouse_id'=>$request->warehouse_id,
        ]);
        Session::flash('success', 'Production Updated Successfully');
        return redirect()->route('production.index');
    }

    public function destroy($id)
    {
        Production::find($id)->delete();
        Session::flash('success', 'Production Deleted Successfully');
        return redirect()->back();

    }
}
