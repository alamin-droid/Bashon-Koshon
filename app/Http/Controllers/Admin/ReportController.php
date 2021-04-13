<?php

namespace App\Http\Controllers\Admin;

use App\Administrative;
use App\Advance;
use App\Collection;
use App\Contrajournal;
use App\Expense;
use App\FamilyCost;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Payroll;
use App\Production;
use App\Purchase;
use App\Sell;
use App\Shooter;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function balance(){
        $to = date('d-m-Y');
        $payments = Payment::orderBy('id', 'DESC')->sum('amount');
        $purchases = Purchase::orderBy('id', 'DESC')->sum('total');
        $administratives = Administrative::orderBy('id', 'DESC')->sum('amount');
        $payrolls = Payroll::orderBy('id', 'DESC')->sum('amount');
        $expenses = Expense::orderBy('id','DESC')->sum('amount');
        $family_costs = FamilyCost::orderBy('id', 'DESC')->sum('amount');
        $owner_cost = Contrajournal::where('transfer_to', '3')->orWhere('transfer_to', '4')->orWhere('transfer_to', '5')->sum('amount');

        $cash_expense = Payment::where('mode_of_payment', 'cash')->orderBy('id', 'DESC')->sum('amount') +
            Purchase::orderBy('id', 'DESC')->sum('extra_expense') + Administrative::where('mode_of_payment', 'cash')->sum('amount')+
            Payroll::orderBy('id', 'DESC')->sum('amount') + Expense::where('mode_of_payment', 'cash')->sum('amount') + FamilyCost::where('mode_of_payment', 'cash')->sum('amount') +
            Contrajournal::where('transfer_to', '3')->orWhere('transfer_to', '4')->orWhere('transfer_to', '5')->where('transfer_from', '0')->sum('amount');


        $collections = Collection::orderBy('id', 'DESC')->sum('amount');
        $owner_collections = Contrajournal::where('transfer_from', '3')->orWhere('transfer_from', '4')->orWhere('transfer_from', '5')->sum('amount');
        $sells = Sell::orderBy('id', 'DESC')->sum('payment');
        $cash_collection = Collection::where('mode_of_payment', 'cash')->sum('amount') + Sell::orderBy('id', 'DESC')->sum('payment') +
                            Contrajournal::where('transfer_from', '3')->orWhere('transfer_from', '4')->orWhere('transfer_from', '5')->where('transfer_to', '0')->sum('amount');
        return view('report.balance', compact('to', 'payments','purchases','administratives', 'payrolls', 'expenses', 'family_costs', 'owner_cost', 'cash_expense',
            'collections', 'owner_collections', 'sells', 'cash_collection'));
    }
    public function balance_date(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;

        $payments = Payment::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('amount');
        $purchases = Purchase::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('total');
        $administratives = Administrative::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('amount');
        $payrolls = Payroll::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('amount');
        $expenses = Expense::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id','DESC')->sum('amount');
        $family_costs = FamilyCost::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('amount');
        $owner_cost = Contrajournal::where('transfer_to', '3')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_to', '4')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_to', '5')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->sum('amount');

        $cash_expense = Payment::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('mode_of_payment', 'cash')->orderBy('id', 'DESC')->sum('amount') +
            Purchase::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('extra_expense') + Administrative::where('mode_of_payment', 'cash')->sum('amount')+
            Payroll::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('amount') + Expense::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('mode_of_payment', 'cash')->sum('amount') +
            FamilyCost::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('mode_of_payment', 'cash')->sum('amount') +
            Contrajournal::where('transfer_to', '3')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_to', '4')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_to', '5')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->sum('amount');


        $collections = Collection::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('amount');
        $owner_collections = Contrajournal::where('transfer_from', '3')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_from', '4')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_from', '5')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->sum('amount');
        $sells = Sell::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('payment');
        $cash_collection = Collection::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('mode_of_payment', 'cash')->sum('amount') + Sell::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->sum('payment') +
            Contrajournal::where('transfer_from', '3')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_from', '4')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orWhere('transfer_from', '5')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->sum('amount');
        return view('report.balance', compact('to', 'from', 'payments','purchases','administratives', 'payrolls', 'expenses', 'family_costs', 'owner_cost', 'cash_expense',
            'collections', 'owner_collections', 'sells', 'cash_collection'));

    }

    public function godown(){
        $from = date('Y-m-1');
        $to = date('Y-m-d');
        $counter = 1;

        $shooters_kura = Shooter::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $purchases_kura = Purchase::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('product', '6')->get();
        $productions_kura = Production::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->where('finishedgood_id', '6')->get();

        $sells = Sell::whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();

        $productions_rice = Production::where('finishedgood_id', '!=', '5')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)
        ->orWhere('finishedgood_id', '!=', '6')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)
        ->orWhere('finishedgood_id', '!=', '7')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)
        ->orderBy('id', 'DESC')->get();
        $purchases_paddy = Purchase::where('product','!=', '5')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)
        ->orWhere('product','!=', '6')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)
        ->orWhere('product','!=', '7')->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)
        ->orderBy('id', 'DESC')->get();

        return view('report.godown', compact('shooters_kura', 'purchases_kura', 'productions_kura', 'sells', 'productions_rice', 'purchases_paddy', 'from', 'to', 'counter'));
    }
}
