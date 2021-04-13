<?php

namespace App\Http\Controllers\Admin;

use App\Finishedgood;
use App\Http\Controllers\Controller;
use App\Production;
use App\Purchase;
use App\Rawmaterial;
use App\Sell;
use App\Shooter;
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
        if($id == 5){
            $shooters = Shooter::orderBy('id', 'DESC')->get();
            $purchases = Purchase::where('product', '6')->get();
            $productions = Production::where('finishedgood_id', '6')->get();
            $sells = Sell::orderBy('id', 'DESC')->get();

            $total_purchase = $purchases->sum('bag') + $productions->sum('finishedgood_quantity');
            $total_sell = 0;
            $counter = 1;
            foreach($shooters as $shooter){
                $shooter['item'] = explode(',',str_replace(str_split('[]""'),'',$shooter->excess_item));
                $shooter['qty'] = explode(',',str_replace(str_split('[]""'),'',$shooter->excess_item_qty));
                for($i=0; $i<count($shooter->item) ;$i++){
                    if($shooter->item[$i] == '6'){
                        $total_purchase += $shooter->qty[$i];
                    }
                }
            }
            foreach($sells as $sell){
                $sell['product'] = explode(',',str_replace(str_split('[]""'),'',$sell->type_of_rice));
                $sell['product_quantity'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
                for($i=0; $i<count($sell->product) ;$i++){
                    if($sell->product[$i] == '6'){
                        $total_sell += $sell->product_quantity[$i];
                    }
                }
            }
            unset ($shooter['item'], $shooter['qty'], $sell['product'], $sell['product_quantity']);
            return view('warehouse.kura', compact('warehouse', 'shooters', 'purchases', 'sells', 'counter', 'total_purchase', 'total_sell', 'productions'));
        }
        if($id == 2){
            $productions = Production::orderBy('id', 'DESC')->paginate();
            $total_production = Production::sum('finishedgood_quantity');
            $total_sell = 0;
            $counter = 1;
            $sells = Sell::orderBy('id', 'DESC')->get();
            foreach($sells as $sell){
                $sell['product'] = explode(',',str_replace(str_split('[]""'),'',$sell->type_of_rice));
                $sell['product_quantity'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
                for($i=0; $i<count($sell->product) ;$i++){
                    if($sell->product[$i] != '5' || $sell->product[$i] != '6'){
                        $total_sell += $sell->product_quantity[$i];
                    }
                }
            }
            unset ($sell['product'], $sell['product_quantity']);
            return view('warehouse.rice', compact('warehouse', 'productions', 'total_production', 'sells', 'counter','total_sell'));
        }
        if($id == 4){
            $purchases = Purchase::where('product','!=', '5')->orWhere('product','!=', '6')->orWhere('product','!=', '7')->get();
            $total_purchase = $purchases->sum('bag');
            $counter = 1;
            return view('warehouse.paddy', compact('warehouse','purchases','total_purchase','counter'));
        }

    }
}
