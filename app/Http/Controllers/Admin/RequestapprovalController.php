<?php

namespace App\Http\Controllers\Admin;

use App\Finishedgood;
use App\Gatepass;
use App\Http\Controllers\Controller;
use App\Production;
use App\Purchase;
use App\Rawmaterial;
use App\Sell;
use App\Supplier;
use Illuminate\Support\Facades\Session;

class RequestapprovalController extends Controller
{
    public function purchase(){
        $purchases = Purchase::orderBy('id', 'DESC')->get();
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        return view('request_approval.purchase', compact('purchases','materials', 'suppliers'));
    }
    public function purchase_approve($id){
        $purchase = Purchase::find($id);
        $purchase->update([
           'status'=>'approved',
        ]);
        Gatepass::create([
           'purchase_id'=>$id,
           'warehouse_id'=>$purchase->warehouse_id,
        ]);
        Session::flash('success', 'Gatepass created Successfully');
        return redirect()->route('request_approval.purchase');
    }

    public function purchase_gatepass($id){
        $purchase = Purchase::find($id);
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        $gatepass = Gatepass::where('purchase_id', $id)->orderBy('id', 'DESC')->first();
        return view('gatepass.purchase', compact('purchase', 'gatepass', 'materials', 'suppliers'));
    }

    public function sales(){
        $sells = Sell::orderBy('id', 'DESC')->get();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        return view('request_approval.sales', compact('sells', 'finishedgoods'));
    }
    public function sales_approve($id){
        $sell = Sell::find($id);
        $sell->update([
            'status'=>'approved',
        ]);
        Gatepass::create([
            'sale_id'=>$id,
            'warehouse_id'=>$sell->warehouse_id,
        ]);
        Session::flash('success', 'Gatepass created Successfully');
        return redirect()->route('request_approval.sales');
    }

    public function sales_gatepass($id){
        $sell = Sell::find($id);
        $gatepass = Gatepass::where('sale_id', $id)->orderBy('id', 'DESC')->first();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        return view('gatepass.sales', compact('sell', 'gatepass', 'finishedgoods'));
    }
    public function production(){
        $productions = Production::orderBy('id', 'DESC')->get();
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        return view('request_approval.production', compact('productions', 'materials'));
    }
    public function production_approve($id){
        $production = Production::find($id);
        $production->update([
            'status'=>'approved',
        ]);
        Gatepass::create([
            'production_id'=>$id,
            'warehouse_id'=>$production->warehouse_id,
        ]);
        Session::flash('success', 'Gatepass created Successfully');
        return redirect()->route('request_approval.production');
    }

    public function production_gatepass($id){
        $production = Production::find($id);
        $gatepass = Gatepass::where('production_id', $id)->orderBy('id', 'DESC')->first();
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        return view('gatepass.production', compact('production', 'gatepass', 'materials'));
    }

}
