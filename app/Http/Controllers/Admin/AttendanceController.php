<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::orderBy('id', 'DESC')->get();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'unique:attendances',
        ]);
        Attendance::create([
            'date'=>date('Y-m-d'),
            'employee_id'=>json_encode($request->employee_id),
            'in_time'=>json_encode($request->entry_time),
            'out_time'=>json_encode($request->exit_time),
            'total_time'=>json_encode($request->total_time),
        ]);
        Session::flash('success', 'Attendance Created Successfully');
        return redirect()->route('attendance.index');
    }

    public function show($id)
    {
        return view('attendance.show', compact('id'));
    }

    public function edit($id)
    {
        $edit = Attendance::find($id);
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('attendance.edit', compact('edit', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);
        $attendance->update([
            'employee_id'=>json_encode($request->employee_id),
            'in_time'=>json_encode($request->entry_time),
            'out_time'=>json_encode($request->exit_time),
            'total_time'=>json_encode($request->total_time),
        ]);
        Session::flash('success', 'Attendance Updated Successfully');
        return redirect()->route('attendance.index');
    }

    public function destroy($id)
    {
        Attendance::find($id)->delete();
        Session::flash('success', 'Attendance Deleted Successfully');
        return redirect()->route('attendance.index');
    }

    public function date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $attendances = Attendance::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        return view('attendance.index', compact('attendances'));
    }
}
