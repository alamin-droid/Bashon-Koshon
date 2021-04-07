<?php

namespace App\Http\Controllers;

use App\Client;
use App\Production;
use App\Purchase;
use App\Sell;
use App\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $m= date("m");
        $de= date("d");
        $y= date("Y");

        $from = date('Y-m-d',mktime(0,0,0,$m,($de-7),$y));
        $to = date('Y-m-d');
        $productions = Production::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $purchased = Purchase::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('quantity');
        $sells = Sell::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id','DESC')->get();
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        $clients = Client::orderBy('id','DESC')->paginate(10);
        $sold = 0;
        foreach($sells as $sell){
            $finishedgood_id = explode(',',str_replace(str_split('[]""'),'',$sell->finishedgood_id));
            $finishedgood_quantity = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));

            for($i=0; $i<count($finishedgood_id) ; $i++){
                $sold += $finishedgood_quantity[$i];
            }

        }
        return view('home', compact('productions', 'purchased','sells', 'clients', 'sold', 'suppliers'));
    }
}
