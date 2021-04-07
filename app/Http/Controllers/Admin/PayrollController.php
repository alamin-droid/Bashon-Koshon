<?php

namespace App\Http\Controllers\Admin;

use App\Advance;
use App\Attendance;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayrollController extends Controller
{

    public function index()
    {
        $from = null;
        $payrolls = Payroll::orderBy('id', 'DESC')->get();
        return view('payroll.index', compact('payrolls', 'from'));
    }

    public function create()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('payroll.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $payroll = Payroll::where('month', $request->month)->where('employee_id', $request->employee_id)->first();
        if(empty($payroll)){
            $advance_id = array();
            $advances = Advance::where('employee_id', $request->employee_id)->where('due_amount', '!=', '0')->orderBy('id', 'DESC')->get();
            foreach($advances as $advance){
                $advance_id[] = $advance->id;
                if($advance->due_amount >= $advance->repaid_per_month){
                    $advance->update([
                        'total_paid'=>$advance->total_paid + $advance->repaid_per_month,
                        'due_amount'=>$advance->due_amount - $advance->repaid_per_month,
                    ]);
                }
                else{
                    $advance->update([
                        'total_paid'=>$advance->total_paid + $advance->due_amount,
                        'due_amount'=>0,
                    ]);
                }
            }
            Payroll::create([
               'date'=>$request->date,
               'month'=>$request->month,
               'employee_id'=>$request->employee_id,
               'salary'=>$request->salary,
               'overtime_time'=>$request->overtime_time,
               'overtime_amount'=>$request->overtime_amount,
               'overtime'=>$request->overtime,
               'salary_deduction'=>$request->salary_deduction,
               'net_amount'=>$request->net_amount,
               'advance_id'=>json_encode($advance_id),
            ]);

            Session::flash('success', 'Payroll Created Successfully');
            return redirect()->route('payroll.index');
        }
        else{
            Session::flash('error', 'Payroll is already created for this employee for this month');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $payroll = Payroll::find($id);
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('payroll.edit', compact('payroll', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $payroll = Payroll::find($id);
            $payroll->update([
                'date'=>$request->date,
                'month'=>$request->month,
                'employee_id'=>$request->employee_id,
                'salary'=>$request->salary,
                'overtime_time'=>$request->overtime_time,
                'overtime_amount'=>$request->overtime_amount,
                'overtime'=>$request->overtime,
                'salary_deduction'=>$request->salary_deduction,
                'net_amount'=>$request->net_amount,
            ]);
            Session::flash('success', 'Payroll Updated Successfully');
            return redirect()->route('payroll.index');
    }

    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        $advance_id = explode(',',str_replace(str_split('[]""'),'',$payroll->advance_id));
        $advances = Advance::whereIn('id', $advance_id)->orderBy('id', 'DESC')->get();
        foreach($advances as $advance){
            $advance->update([
                'total_paid'=>$advance->total_paid - $advance->repaid_per_month,
                'due_amount'=>$advance->due_amount + $advance->repaid_per_month,
            ]);
        }
        $payroll->delete();
        Session::flash('success', 'Payroll Deleted Successfully');
        return redirect()->back();
    }
    public function date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $payrolls = Payroll::whereDate('date','>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        return view('payroll.index', compact('payrolls', 'from', 'to'));
    }
    public function payslip($id){
        $payroll = Payroll::find($id);
        $advance_id = explode(',',str_replace(str_split('[]""'),'',$payroll->advance_id));
        $advance = Advance::whereIn('id', $advance_id)->sum('repaid_per_month');
        return view('payroll.payslip', compact('payroll', 'advance'));
    }

    public function employee($id){
        $employee = Employee::find($id);
        return response()->json($employee);
    }
    public function overtime($id){
        $hour =0;
        $eid = explode('_', $id);
        $month = explode('-', $eid[1]);
        $attendance = Attendance::where('employee_id', $eid[0])->where('year',$month[0])->where('month', $month[1])->orderBy('id', 'DESC')->first();
        $overtime = explode(',',str_replace(str_split('[]""'),'',$attendance->overtime));
        for($i=0 ; $i<count($overtime) ;$i++){
            if($overtime[$i] != 'null'){
                $hour += $overtime[$i];
            }
        }
        return response()->json($hour);
    }
}
