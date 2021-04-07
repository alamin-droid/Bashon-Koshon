<?php

namespace App\Http\Controllers\Admin;

use App\Finishedgood;
use App\Http\Controllers\Controller;
use App\Production;
use App\Purchase;
use App\Rawmaterial;
use App\Sell;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
   public function rawmaterial(){
       $purchases = Purchase::where('status', 'approved')->orderBy('id', 'DESC')->get();
       $productions = Production::orderBy('id', 'DESC')->get();
       $rawmaterials = Rawmaterial::orderBy('id', 'DESC')->get();
       $from = null;
       return view('inventory.rawmaterial', compact( 'purchases', 'productions', 'rawmaterials', 'from'));
   }
   public function rawmaterial_date_search(Request $request){
       $from = $request->date_from;
       $to = $request->date_to;
       $purchases = Purchase::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('status', 'approved')->orderBy('id', 'DESC')->get();
       $productions = Production::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
       $rawmaterials = Rawmaterial::orderBy('id', 'DESC')->get();
       return view('inventory.rawmaterial', compact('purchases', 'productions', 'rawmaterials', 'from', 'to'));
   }
    public function production(){
        $productions = Production::orderBy('id', 'DESC')->get();
        $sells = Sell::where('status', 'approved')->orderBy('id', 'DESC')->get();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        $from = null;
        return view('inventory.production', compact('productions', 'sells', 'finishedgoods', 'from'));
    }
    public function production_date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $productions = Production::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $sells = Sell::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('status', 'approved')->orderBy('id', 'DESC')->get();
        $finishedgoods = Finishedgood::orderBy('id', 'DESC')->get();
        return view('inventory.production', compact('productions', 'sells', 'finishedgoods', 'from', 'to'));
    }

}
