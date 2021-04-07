<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Client;
use App\Collection;
use App\Http\Controllers\Controller;
use App\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CollectionController extends Controller
{

    public function index()
    {
        $collections = Collection::orderBy('id', 'DESC')->paginate(10);
        return view('collection.index', compact('collections'));
    }

    public function create()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('collection.create', compact('clients', 'banks'));
    }

    public function store(Request $request)
    {

        if(!empty($request->client_id)){
            $client = explode('_', $request->client_id);
            $client_id = $client[0];
        }
        else{
            $client_id = null;
        }

        Collection::create([
           'date'=>$request->date,
           'client_id'=>$client_id,
           'retail_sell'=>$request->retail_sell,
           'amount'=>$request->amount,
           'mode_of_payment'=>$request->mode_of_payment_received,
           'debit'=>$request->debit,
           'debit_amount'=>$request->debit_amount,
           'mode_of_payment_name'=>$request->mode_of_payment_name,
           'client_name'=>$request->client_name,
           'credit'=>$request->credit,
           'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Collection Created Successfully');
        return redirect()->route('collection.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $collection = Collection::find($id);
        $clients = Client::orderBy('id', 'DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('collection.edit', compact('collection', 'clients', 'banks'));

    }

    public function update(Request $request, $id)
    {
        if(!empty($request->client_id)){
            $client = explode('_', $request->client_id);
            $client_id = $client[0];
        }
        else{
            $client_id = null;
        }
        $collection = Collection::find($id);
        $collection->update([
            'date'=>$request->date,
            'client_id'=>$client_id,
            'retail_sell'=>$request->retail_sell,
            'amount'=>$request->amount,
            'mode_of_payment'=>$request->mode_of_payment_received,
            'debit'=>$request->debit,
            'debit_amount'=>$request->debit_amount,
            'mode_of_payment_name'=>$request->mode_of_payment_name,
            'client_name'=>$request->client_name,
            'credit'=>$request->credit,
            'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Collection Updated Successfully');
        return redirect()->route('collection.index');
    }

    public function destroy($id)
    {
        Collection::find($id)->delete();
        Session::flash('success', 'Collection Deleted Successfully');
        return redirect()->route('collection.index');
    }
    public function client_due($id){
        $total_sell = 0;
        $sells = Sell::where('client_id', $id)->where('status', 'approved')->get();
        foreach($sells as $sell){
            $quantity = explode(',',str_replace(str_split('[]""'),'',$sell->quantity));
            $rate_per_unit = explode(',',str_replace(str_split('[]""'),'',$sell->rate_per_unit));
            for($i = 0 ; $i<count($quantity) ; $i++){
                $total_sell += $quantity[$i] * $rate_per_unit[$i];
            }
        }
        $collection = Collection::where('client_id', $id)->sum('amount');
        $dues = $total_sell - $collection;
        return response()->json($dues);
    }

    public function search_date(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $collections = Collection::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->paginate(10);
        return view('collection.index', compact('collections'));
    }
}
