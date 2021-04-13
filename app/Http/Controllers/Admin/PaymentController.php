<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Purchase;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::orderBy('id', 'DESC')->paginate(10);
        return view('payment.index', compact('payments'));
    }


    public function create()
    {
        $suppliers = Supplier::orderBy('id', 'DESC')->geT();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('payment.create', compact('suppliers', 'banks'));
    }


    public function store(Request $request)
    {
        Payment::create([
           'date'=>$request->date,
           'supplier_id'=>$request->supplier_id,
           'due_amount'=>$request->due_amount,
           'amount'=>$request->amount,
           'mode_of_payment'=>$request->mode_of_payment,
           'debit'=>$request->debit,
           'debit_amount'=>$request->debit_amount,
           'mode_of_payment_name'=>$request->mode_of_payment_name,
           'credit'=>$request->credit,
           'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Payment Created Successfully');
        return redirect()->route('payment.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $payment = Payment::find($id);
        $suppliers = Supplier::orderBy('id', 'DESC')->geT();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('payment.edit', compact('payment', 'suppliers', 'banks'));

    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->update([
            'date'=>$request->date,
            'supplier_id'=>$request->supplier_id,
            'due_amount'=>$request->due_amount,
            'amount'=>$request->amount,
            'mode_of_payment'=>$request->mode_of_payment,
            'debit'=>$request->debit,
            'debit_amount'=>$request->debit_amount,
            'mode_of_payment_name'=>$request->mode_of_payment_name,
            'credit'=>$request->credit,
            'credit_amount'=>$request->credit_amount,
        ]);
        Session::flash('success', 'Payment Updated Successfully');
        return redirect()->route('payment.index');
    }


    public function destroy($id)
    {
        Payment::find($id)->delete();
        Session::flash('success', 'Payment Deleted Successfully');
        return redirect()->back();
    }

    public function supplier_due($id){
        $purchased = Purchase::where('supplier_id', $id)->sum('total') - Purchase::where('supplier_id', $id)->sum('extra_expense');
        $payment = Payment::where('supplier_id', $id)->sum('amount');
        $dues = $purchased - $payment;
        return response()->json($dues);
    }

    public function search_date(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;

        $payments = Payment::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->paginate(10);
        return view('payment.index', compact('payments'));
    }
}
