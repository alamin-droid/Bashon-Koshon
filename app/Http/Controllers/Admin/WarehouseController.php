<?php

namespace App\Http\Controllers\Admin;

use App\Finishedgood;
use App\Http\Controllers\Controller;
use App\Production;
use App\Purchase;
use App\Rawmaterial;
use App\Sell;
use App\Supplier;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WarehouseController extends Controller
{

    public function index()
    {
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        return view('warehouse.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouse.create');
    }


    public function store(Request $request)
    {
        Warehouse::create([
           'name'=>$request->name,
           'address'=>$request->address,
        ]);
        Session::flash('success', 'Warehouse Created Successfully');
        return redirect()->route('warehouse.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouse.edit', compact('warehouse'));
    }


    public function update(Request $request, $id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->update([
            'name'=>$request->name,
            'address'=>$request->address,
        ]);
        Session::flash('success', 'Warehouse Updated Successfully');
        return redirect()->route('warehouse.index');
    }


    public function destroy($id)
    {
        Warehouse::find($id)->delete();
        Session::flash('success', 'Warehouse Deleted Successfully');
        return redirect()->back();
    }
    public function warehouse_details($id){
        $warehouse = Warehouse::find($id);
//        $purchases = Purchase::where('warehouse_id', $id)->where('status', 'approved')->orderBy('id', 'DESC')->paginate(10);
//        $sells = Sell::where('warehouse_id', $id)->where('status', 'approved')->orderBy('id', 'DESC')->paginate(10);
//        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
//        $productions = Production::orderBy('id', 'DESC')->sum('finishedgood_quantity');
//        $purchased = 0;
//        foreach($purchases as $purchase){
//            $quantity = explode(',',str_replace(str_split('[]""'),'',$purchase->quantity));
//            for($i=0 ;$i<count($quantity) ; $i++){
//                $purchased += $quantity[$i];
//            }
//        }
//        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
//        $suppliers = Supplier::orderBy('id', 'DESC')->get();
//        $production_approves = Production::where('status', 'approved')->orderBy('id', 'DESC')->paginate(10);
        return view('warehouse.details', compact('warehouse'));
    }
}
