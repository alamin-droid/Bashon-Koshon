<?php

namespace App\Http\Controllers\Admin;

use App\Advance;
use App\Attendance;
use App\Employee;
use App\EmployeeAccount;
use App\Http\Controllers\Controller;
use App\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->paginate(20);
        return view('employee.index', compact('employees'));
    }
    public function create()
    {
        return view('employee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:employees',
        ]);
            $document = $request->file('image');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/employees/',$document_name);
            $cv = $request->file('cv');
            $cv_name = rand().'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path().'/assets/images/employees/cv/',$cv_name);
          Employee::create([
                'name'=>$request->name,
                'age'=>$request->age,
                'image'=>$document_name,
                'address'=>$request->address,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'cv'=>$cv_name,
                'salary'=>$request->salary,
                'joining_date'=>$request->joining_date,
                'contract'=>$request->contract,
            ]);
            Session::flash('success', 'Employee profile Created succesfully');
            return redirect()->route('employee.index');

    }

    public function show($id)
    {
        $employee = Employee::find($id);
        $payrolls = Payroll::where('employee_id', $id)->get();
        $attendances = Attendance::orderBy('id', 'DESC')->get();
        return view('employee.show', compact('employee', 'payrolls', 'attendances'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:employees,email,'.$id,
        ]);
        $employee = Employee::find($id);
        $d = Employee::find($id);
        if(!empty($request->file('image')) && !empty($request->file('cv'))){
            $document = $request->file('image');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/employees/',$document_name);
            $cv = $request->file('cv');
            $cv_name = rand().'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path().'/assets/images/employees/cv/',$cv_name);

            $employee->update([
                'name'=>$request->name,
                'age'=>$request->age,
                'image'=>$document_name,
                'address'=>$request->address,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'cv'=>$cv_name,
                'salary'=>$request->salary,
                'joining_date'=>$request->joining_date,
                'contract'=>$request->contract,
            ]);
            unlink('assets/images/employees/'.$d->image);
            unlink('assets/images/employees/cv/'.$d->cv);
        }
        elseif(!empty($request->file('image')) && empty($request->file('cv'))){
            $document = $request->file('image');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/employees/',$document_name);
            $employee->update([
                'name'=>$request->name,
                'age'=>$request->age,
                'image'=>$document_name,
                'address'=>$request->address,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'salary'=>$request->salary,
                'joining_date'=>$request->joining_date,
                'contract'=>$request->contract,
            ]);
            unlink('assets/images/employees/'.$d->image);
        }
        elseif(empty($request->file('image')) && !empty($request->file('cv'))){
            $cv = $request->file('cv');
            $cv_name = rand().'.'.$cv->getClientOriginalExtension();
            $cv->move(public_path().'/assets/images/employees/cv/',$cv_name);
            $employee->update([
                'name'=>$request->name,
                'age'=>$request->age,
                'address'=>$request->address,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'cv'=>$cv_name,
                'salary'=>$request->salary,
                'joining_date'=>$request->joining_date,
                'contract'=>$request->contract,
            ]);
            unlink('assets/images/employees/cv/'.$d->cv);
        }
        else{
            $employee->update([
                'name'=>$request->name,
                'age'=>$request->age,
                'address'=>$request->address,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'salary'=>$request->salary,
                'joining_date'=>$request->joining_date,
                'contract'=>$request->contract,
            ]);
        }
        Session::flash('success', 'Employee profile updated succesfully');
        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        unlink('assets/images/employees/'.$employee->image);
        unlink('assets/images/employees/cv/'.$employee->cv);
        $employee->delete();
        Session::flash('success', 'Employee profile Deleted succesfully');
        return redirect()->route('employee.index');
    }

    public function search(Request $request){
        $input = $request->item;
        $employees = Employee::where('name', 'like', "%$input%")
            ->orWhere('phone', 'like', "%$input%")
            ->orderBy('id', 'DESC')->paginate(20);
        return view('employee.index', compact('employees'));
    }
}
