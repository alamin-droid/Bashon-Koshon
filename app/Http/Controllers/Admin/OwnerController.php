<?php

namespace App\Http\Controllers\Admin;

use App\ContraJournal;
use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{

    public function index()
    {
        $owners = Owner::orderBy('id', 'DESC')->get();
        return view('owner.index', compact('owners'));
    }

    public function create()
    {
        return view('owner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'unique:owners',
        ]);
        $document = $request->file('photo');
        if(!empty($document)){
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/owner/',$document_name);
        }
        else{
            $document_name = $request->photo;
        }
        Owner::create([
            'name'=>$request->name,
            'photo'=>$document_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'designation'=>$request->designation,
        ]);
        Session::flash('success', 'Owner created Successfully');
        return redirect()->route('owner.index');
    }

    public function show($id)
    {
        $show = Owner::find($id);
        $debit = ContraJournal::where('transfer_from', $id)->get(['date', 'debit_amount'])->toArray();
        $credit = ContraJournal::where('transfer_to', $id)->get(['date', 'credit_amount'])->toArray();
        $results = array_merge($debit, $credit);
        usort($results, function($a,$b) {
            return $a['date'] < $b['date'];
        });
        $from = null;
        return view('owner.show', compact('show', 'results', 'from'));
    }

    public function edit($id)
    {
        $edit = Owner::find($id);
        return view('owner.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'phone' => 'unique:owners,phone,'.$id,
        ]);
        $owner = Owner::find($id);
        $d = Owner::find($id);

        if(!empty($request->file('photo'))){
            if(!empty($d->photo)){
                unlink('assets/images/owner/'.$d->photo);
            }
            $document = $request->file('photo');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/owner/',$document_name);
            $owner->update([
                'name'=>$request->name,
                'photo'=>$document_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'designation'=>$request->designation,
            ]);
        }
        else{
            $owner->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'designation'=>$request->designation,
            ]);
        }
        Session::flash('success', 'Owner profile Updated Successfully');
        return redirect()->route('owner.index');
    }

    public function destroy($id)
    {
        Owner::find($id)->delete();
        Session::flash('success', 'Owner deleted Successfully');
        return redirect()->route('owner.index');
    }

    public function balance_search(Request $request){
        $id = $request->id;
        $from = $request->date_from;
        $to = $request->date_to;
        $show = Owner::find($id);
        $debit = ContraJournal::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('transfer_from', $id)->get(['date', 'debit_amount'])->toArray();
        $credit = ContraJournal::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('transfer_to', $id)->get(['date', 'credit_amount'])->toArray();
        $results = array_merge($debit, $credit);
        usort($results, function($a,$b) {
            return $a['date'] < $b['date'];
        });
        return view('owner.show', compact('show', 'results', 'from', 'to'));
    }
}
