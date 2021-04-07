<?php

namespace App\Http\Controllers\Admin;

use App\Administrative;
use App\Advance;
use App\Collection;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Payroll;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function balance(){
        $to = date('d-m-Y');
        $payments = Payment::orderBy('id', 'DESC')->get();
        $administratives = Administrative::orderBy('id', 'DESC')->get();
        $advances = Advance::orderBy('id', 'DESC')->get();
        $payrolls = Payroll::orderBy('id', 'DESC')->get();
        $collections = Collection::orderBy('id', 'DESC')->get();
        return view('report.balance', compact('to', 'payments', 'administratives', 'advances', 'payrolls', 'collections'));
    }
    public function balance_date(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $payments = Payment::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $administratives = Administrative::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $advances = Advance::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $payrolls = Payroll::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $collections = Collection::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        return view('report.balance', compact('to','from', 'payments', 'administratives', 'advances', 'payrolls', 'collections'));
    }
}
