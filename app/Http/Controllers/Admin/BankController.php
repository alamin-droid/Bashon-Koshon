<?php

namespace App\Http\Controllers\Admin;

use App\Administrative;
use App\Bank;
use App\Collection;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::orderBy('id', 'DESC')->paginate(20);
        return view('banks.index', compact('banks'));
    }
    public function create()
    {
        return view('banks.create');
    }
    public function store(Request $request)
    {
        Bank::create([
           'bank_name'=>$request->bank_name,
           'branch'=>$request->branch,
           'account'=>$request->account,
        ]);
        Session::flash('success', 'Bank account created successfully');
        return redirect()->route('bank.index');
    }
    public function show($id)
    {
        $from = null;
        $bank = Bank::find($id);
        $collections = Collection::where('mode_of_payment_name', $bank->account)->orderBy('date', 'DESC')->get()->toArray();
        $payments = Payment::where('mode_of_payment_name', $bank->account)->orderBy('date', 'DESC')->get()->toArray();
        $administratives = Administrative::where('mode_of_payment_name', $bank->account)->orderBy('date', 'DESC')->get()->toArray();
        $results = array_merge($collections, $payments, $administratives);
        usort($results, function($a,$b) {
            return $a['date'] < $b['date'];
        });
        return view('banks.show',compact('bank','results', 'from'));
    }
    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('banks.edit', compact('bank'));
    }
    public function update(Request $request, $id)
    {
        $bank = Bank::find($id);
        $bank->update([
            'bank_name'=>$request->bank_name,
            'branch'=>$request->branch,
            'account'=>$request->account,
        ]);
        Session::flash('success', 'Bank account created successfully');
        return redirect()->route('bank.index');
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        Session::flash('success', 'Bank account Deleted successfully');
        return redirect()->back();
    }

    public function date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $id = $request->id;
        $bank = Bank::find($id);
        $collections = Collection::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('mode_of_payment_name', $bank->account)->orderBy('date', 'DESC')->get()->toArray();
        $payments = Payment::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('mode_of_payment_name', $bank->account)->orderBy('date', 'DESC')->get()->toArray();
        $administratives = Administrative::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('mode_of_payment_name', $bank->account)->orderBy('date', 'DESC')->get()->toArray();
        $results = array_merge($collections, $payments, $administratives);
        usort($results, function($a,$b) {
            return $a['date'] < $b['date'];
        });
        return view('banks.show',compact('bank','results', 'from', 'to'));
    }
}
