<?php

namespace App\Http\Controllers\Admin;

use App\Administrative;
use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdministrativeController extends Controller
{

    public function index()
    {
        $administratives = Administrative::orderBy('id', 'DESC')->paginate(20);
        return view('administrative.index', compact('administratives'));
    }

    public function create()
    {
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('administrative.create', compact('banks'));
    }

    public function store(Request $request)
    {
        Administrative::create([
           'date'=>$request->date,
           'item_name'=>$request->item_name,
           'amount'=>$request->amount,
           'mode_of_payment'=>$request->mode_of_payment,
           'debit'=>$request->debit,
           'debit_amount'=>$request->debit_amount,
           'mode_of_payment_name'=>$request->mode_of_payment_name,
           'credit'=>$request->credit,
           'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Administrative Expense created Successfully');
        return redirect()->route('administrative.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $administrative = Administrative::find($id);
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('administrative.edit', compact('administrative', 'banks'));

    }

    public function update(Request $request, $id)
    {
        $administrative = Administrative::find($id);
        $administrative->update([
            'date'=>$request->date,
            'item_name'=>$request->item_name,
            'amount'=>$request->amount,
            'mode_of_payment'=>$request->mode_of_payment,
            'debit'=>$request->debit,
            'debit_amount'=>$request->debit_amount,
            'mode_of_payment_name'=>$request->mode_of_payment_name,
            'credit'=>$request->credit,
            'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Administrative Expense updated Successfully');
        return redirect()->route('administrative.index');
    }

    public function destroy($id)
    {
        Administrative::find($id)->delete();
        Session::flash('success', 'Administrative Expense Deleted Successfully');
        return redirect()->route('administrative.index');
    }

    public function search_date(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $administratives = Administrative::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->paginate(20);
        return view('administrative.index', compact('administratives'));
    }
}
