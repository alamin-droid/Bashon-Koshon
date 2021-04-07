<?php

namespace App\Http\Controllers\Admin;

use App\Advance;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdvanceController extends Controller
{

    public function index()
    {
        $from = null;
        $advances = Advance::orderBy('id', 'DESC')->get();
        return view('advance.index', compact('advances', 'from'));
    }

    public function create()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('advance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        Advance::create([
           'date'=>$request->date,
           'employee_id'=>$request->employee_id,
           'amount'=>$request->amount,
           'repaid_per_month'=>$request->repaid_per_month,
           'total_paid'=>'0',
           'due_amount'=>$request->amount,
        ]);
        Session::flash('success', 'Advance payment to the employee created successfully');
        return redirect()->route('advance.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $advance = Advance::find($id);
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('advance.edit', compact('advance', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $advance = Advance::find($id);
        $advance->update([
            'date'=>$request->date,
            'employee_id'=>$request->employee_id,
            'amount'=>$request->amount,
            'repaid_per_month'=>$request->repaid_per_month,
            'due_amount'=>$request->amount - $advance->total_paid,
        ]);
        Session::flash('success', 'Advance payment to the employee updated successfully');
        return redirect()->route('advance.index');
    }

    public function destroy($id)
    {
        Advance::find($id)->delete();
        Session::flash('success', 'Advance payment to the employee deleted successfully');
        return redirect()->back();
    }

    public function date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $advances = Advance::whereDate('date','>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        return view('advance.index', compact('advances', 'from', 'to'));
    }
}
