<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Expense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{

    public function index()
    {
        $expenses = Expense::orderBy('date', 'DESC')->paginate(30);
        return view('expense.index', compact('expenses'));
    }

    public function create()
    {
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('expense.create', compact('banks'));
    }

    public function store(Request $request)
    {
        Expense::create([
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
        Session::flash('success', 'Expense created Successfully');
        return redirect()->route('expense.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $edit = Expense::find($id);
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('expense.edit', compact('edit', 'banks'));
    }

    public function update(Request $request, $id)
    {
        $update = Expense::find($id);
        $update->update([
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
        Session::flash('success', ' Expense updated Successfully');
        return redirect()->route('expense.index');
    }

    public function destroy($id)
    {
        Expense::find($id)->delete();
        Session::flash('success', ' Expense Deleted Successfully');
        return redirect()->route('expense.index');
    }
    public function search_date(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $expenses = Expense::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->paginate(30);
        return view('expense.index', compact('expenses'));
    }
}
