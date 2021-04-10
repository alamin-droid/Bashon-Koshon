<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Client;
use App\Finishedgood;
use App\Gatepass;
use App\Http\Controllers\Controller;
use App\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberToWords\NumberToWords;

class SellController extends Controller
{

    public function index()
    {
        $sells = Sell::orderBy('id', 'DESC')->paginate(10);
        return view('sell.index', compact('sells'));
    }

    public function create()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        $finished_goods = Finishedgood::orderBy('id', 'DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('sell.create', compact('clients', 'finished_goods','banks'));
    }

    public function store(Request $request)
    {
        if($request->mode_of_payment == 1){
            $mode_of_payment = 'Cash';
        }
        else{
            if(!empty($request->bank_account)){
                $mode_of_payment = $request->bank_account;
            }
            else{
                Session::flash('error', 'Bank Account is not selected');
                return redirect()->back();
            }

        }

        Sell::create([
           'date'=>$request->date,
           'client_id'=>$request->client_id,
           'type_of_rice'=>json_encode($request->finished_good_id),
           'quantity'=>json_encode($request->quantity),
           'quantity_kg'=>json_encode($request->quantity_kg),
           'unit_price'=>json_encode($request->unit_price),
           'total_price'=>json_encode($request->total_price),
           'total'=>$request->total,
           'payment'=>$request->payment,
           'mode_of_payment'=>$mode_of_payment,
        ]);
        Session::flash('success', 'Sell is created successfully');
        return redirect()->route('sell.index');
    }

    public function show($id)
    {
        $sell = Sell::find($id);
        $sell['type_of_rice'] = explode(',',str_replace(str_split('[]""'),'',$sell->type_of_rice));
        $sell['quantity'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
        $sell['quantity_kg'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity_kg));
        $sell['unit_price'] = explode(',',str_replace(str_split('[]""'),'',$sell->unit_price));
        $sell['total_price'] = explode(',',str_replace(str_split('[]""'),'',$sell->total_price));
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        return view('sell.invoice', compact('sell',  'numberTransformer'));
    }

    public function edit($id)
    {
        $edit = Sell::find($id);
        $edit['type_of_rice'] = explode(',',str_replace(str_split('[]""'),'',$edit->type_of_rice));
        $edit['quantity'] = explode(',',str_replace(str_split('[]""'),'',$edit->quantity));
        $edit['quantity_kg'] = explode(',',str_replace(str_split('[]""'),'',$edit->quantity_kg));
        $edit['unit_price'] = explode(',',str_replace(str_split('[]""'),'',$edit->unit_price));
        $edit['total_price'] = explode(',',str_replace(str_split('[]""'),'',$edit->total_price));

        $clients = Client::orderBy('id', 'DESC')->get();
        $finished_goods = Finishedgood::orderBy('id', 'DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('sell.edit', compact('edit', 'clients', 'finished_goods', 'banks'));
    }

    public function update(Request $request, $id)
    {
        if($request->mode_of_payment == 1){
            $mode_of_payment = 'Cash';
        }
        else{
            if(!empty($request->bank_account)){
                $mode_of_payment = $request->bank_account;
            }
            else{
                Session::flash('error', 'Bank Account is not selected');
                return redirect()->back();
            }

        }
        $update = Sell::find($id);
        $update->update([
            'date'=>$request->date,
            'client_id'=>$request->client_id,
            'type_of_rice'=>json_encode($request->finished_good_id),
            'quantity'=>json_encode($request->quantity),
            'quantity_kg'=>json_encode($request->quantity_kg),
            'unit_price'=>json_encode($request->unit_price),
            'total_price'=>json_encode($request->total_price),
            'total'=>$request->total,
            'payment'=>$request->payment,
            'mode_of_payment'=>$mode_of_payment,
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
        $sell['type_of_rice'] = explode(',',str_replace(str_split('[]""'),'',$sell->type_of_rice));
        $sell['quantity'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
        $sell['quantity_kg'] = explode(',',str_replace(str_split('[]""'),'',$sell->quantity_kg));
        $sell['unit_price'] = explode(',',str_replace(str_split('[]""'),'',$sell->unit_price));
        $sell['total_price'] = explode(',',str_replace(str_split('[]""'),'',$sell->total_price));
        return view('sell.challan', compact('sell'));
    }
}
