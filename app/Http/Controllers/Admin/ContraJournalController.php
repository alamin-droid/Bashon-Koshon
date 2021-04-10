<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\ContraJournal;
use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContraJournalController extends Controller
{

    public function index()
    {
        $contra_journals = ContraJournal::orderBy('id', 'DESC')->paginate(30);
        return view('contra_journal.index', compact('contra_journals'));
    }

    public function create()
    {
        $owners = Owner::orderBy('id','DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('contra_journal.create', compact('owners', 'banks'));
    }

    public function store(Request $request)
    {
        ContraJournal::create([
            'company_id_from'=>$request->company_id_from,
            'date'=>$request->date,
            'transfer_from'=>$request->transfer_from,
            'amount'=>$request->amount,
            'company_id_to'=>$request->company_id_to,
            'transfer_to'=>$request->transfer_to,
            'transfer_amount_to'=>$request->transfer_amount_to,
            'debit'=>$request->debit,
            'debit_amount'=>$request->debit_amount,
            'transfer_amount_from'=>$request->transfer_amount_from,
            'credit'=>$request->credit,
            'credit_amount'=>$request->credit_amount,
            'details'=>$request->details,
        ]);
        Session::flash('success', 'Contra Journal Created Successfully');
        return redirect()->route('contra_journal.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $edit = ContraJournal::find($id);
        $owners = Owner::orderBy('id','DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('contra_journal.edit', compact('edit', 'owners', 'banks'));
    }


    public function update(Request $request, $id)
    {
        $update = ContraJournal::find($id);
        $update->update([
            'company_id_from'=>$request->company_id_from,
            'date'=>$request->date,
            'transfer_from'=>$request->transfer_from,
            'amount'=>$request->amount,
            'company_id_to'=>$request->company_id_to,
            'transfer_to'=>$request->transfer_to,
            'transfer_amount_to'=>$request->transfer_amount_to,
            'debit'=>$request->debit,
            'debit_amount'=>$request->debit_amount,
            'transfer_amount_from'=>$request->transfer_amount_from,
            'credit'=>$request->credit,
            'credit_amount'=>$request->credit_amount,
            'details'=>$request->details,
        ]);
        Session::flash('success', 'Contra Journal Updated Successfully');
        return redirect()->route('contra_journal.index');
    }

    public function destroy($id)
    {
        ContraJournal::find($id)->delete();
        Session::flash('success', 'Contra Journal Deleted Successfully');
        return redirect()->route('contra_journal.index');
    }
}
