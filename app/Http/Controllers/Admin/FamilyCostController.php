<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\FamilyCost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FamilyCostController extends Controller
{

    public function index()
    {
        $family_costs = FamilyCost::orderBy('id', 'DESC')->paginate(20);
        return view('family_cost.index', compact('family_costs'));
    }

    public function create()
    {
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('family_cost.create', compact('banks'));
    }

    public function store(Request $request)
    {
        FamilyCost::create([
            'date'=>$request->date,
            'cost_for'=>$request->item_name,
            'amount'=>$request->amount,
            'mode_of_payment'=>$request->mode_of_payment,
            'debit'=>$request->debit,
            'debit_amount'=>$request->debit_amount,
            'mode_of_payment_name'=>$request->mode_of_payment_name,
            'credit'=>$request->credit,
            'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Family Expense created Successfully');
        return redirect()->route('family_cost.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = FamilyCost::find($id);
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('family_cost.edit', compact('edit', 'banks'));

    }

    public function update(Request $request, $id)
    {
        $update = FamilyCost::find($id);
        $update->update([
            'date'=>$request->date,
            'cost_for'=>$request->item_name,
            'amount'=>$request->amount,
            'mode_of_payment'=>$request->mode_of_payment,
            'debit'=>$request->debit,
            'debit_amount'=>$request->debit_amount,
            'mode_of_payment_name'=>$request->mode_of_payment_name,
            'credit'=>$request->credit,
            'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Family Expense updated Successfully');
        return redirect()->route('family_cost.index');
    }

    public function destroy($id)
    {
        FamilyCost::find($id)->delete();
        Session::flash('success', 'Family Expense Deleted Successfully');
        return redirect()->route('family_cost.index');
    }

    public function search_date(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $family_costs = FamilyCost::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->paginate(20);
        return view('family_cost.index', compact('family_costs'));
    }
}
