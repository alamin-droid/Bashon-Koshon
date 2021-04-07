<?php

namespace App\Http\Controllers\Admin;

use App\Cheque;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberToWords\NumberToWords;

class ChequeController extends Controller
{

    public function index()
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $cheques = Cheque::orderBy('id','DESC')->paginate(20);
        return view('cheque.index', compact('cheques'));
    }

    public function create()
    {
        return view('cheque.create');
    }

    public function store(Request $request)
    {
        Cheque::create([
           'date'=>$request->date,
           'pay_to'=>$request->pay_to,
           'amount'=>$request->amount,
           'ac_payee'=>$request->ac_payee,
        ]);
        Session::flash('success', 'Cheque book entered successfully');
        return redirect()->route('cheque.index');
    }

    public function show($id)
    {
        $cheque = Cheque::find($id);
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        return view('cheque.print', compact('cheque', 'numberTransformer'));
    }

    public function edit($id)
    {
        $cheque = Cheque::find($id);
        return view('cheque.edit', compact('cheque'));
    }

    public function update(Request $request, $id)
    {
        $cheque = Cheque::find($id);
        $cheque->update([
            'date'=>$request->date,
            'pay_to'=>$request->pay_to,
            'amount'=>$request->amount,
            'ac_payee'=>$request->ac_payee,
        ]);
        Session::flash('success', 'Cheque book Updated successfully');
        return redirect()->route('cheque.index');
    }

    public function destroy($id)
    {
        Cheque::find($id)->delete();
        Session::flash('success', 'Cheque book Deleted successfully');
        return redirect()->route('cheque.index');
    }
}
