<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Client;
use App\Finishedgood;
use App\Http\Controllers\Controller;
use App\Shooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Rakibhstu\Banglanumber\NumberToBangla;

class ShooterController extends Controller
{

    public function index()
    {
        $shooters = Shooter::orderBy('id', 'DESC')->paginate(30);
        return view('shooter.index', compact('shooters'));
    }

    public function create()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        $finished_goods = Finishedgood::orderBy('id', 'DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('shooter.create', compact('clients', 'finished_goods', 'banks'));
    }

    public function store(Request $request)
    {
        if($request->mode_of_payment == 1){
            $mode_of_payment = 'Cash';
        }
        else{
            if(!empty($request->bank_account)){
                $mode_of_payment = $request->bank_account;
            }
            else{
                Session::flash('error', 'Bank Account is not selected');
                return redirect()->back();
            }

        }

        Shooter::create([
           'date'=>$request->date,
           'client_id'=>$request->client_id,
           'before_shooter_qty'=>$request->before_shooter_qty,
           'after_shooter_qty'=>$request->after_shooter_qty,
           'shooter_price_per_bag'=>$request->shooter_price_per_bag,
           'shooter_total_price'=>$request->shooter_total_price,
           'excess_item'=>json_encode($request->excess_item),
           'excess_item_qty'=>json_encode($request->excess_item_qty),
           'excess_item_price_bag'=>json_encode($request->excess_item_price_bag),
           'excess_item_total_price'=>json_encode($request->excess_item_total_price),
           'total'=>$request->total,
           'payment'=>$request->payment,
           'due'=>$request->due,
           'notes'=>$request->notes,
           'mode_of_payment'=>$mode_of_payment,
        ]);
        Session::flash('success', 'Shooter is created successfully');
        return redirect()->route('shooter.index');
    }

    public function show($id)
    {
        $show = Shooter::find($id);
        $show['excess_item'] = explode(',',str_replace(str_split('[]""'),'',$show->excess_item));
        $show['excess_item_qty'] = explode(',',str_replace(str_split('[]""'),'',$show->excess_item_qty));
        $show['excess_item_price_bag'] = explode(',',str_replace(str_split('[]""'),'',$show->excess_item_price_bag));
        $show['excess_item_total_price'] = explode(',',str_replace(str_split('[]""'),'',$show->excess_item_total_price));
        $num_to = new NumberToBangla();
        return view('shooter.show', compact('show', 'num_to'));
    }


    public function edit($id)
    {
        $edit = Shooter::find($id);
        $edit['excess_item'] = explode(',',str_replace(str_split('[]""'),'',$edit->excess_item));
        $edit['excess_item_qty'] = explode(',',str_replace(str_split('[]""'),'',$edit->excess_item_qty));
        $edit['excess_item_price_bag'] = explode(',',str_replace(str_split('[]""'),'',$edit->excess_item_price_bag));
        $edit['excess_item_total_price'] = explode(',',str_replace(str_split('[]""'),'',$edit->excess_item_total_price));
        $clients = Client::orderBy('id', 'DESC')->get();
        $finished_goods = Finishedgood::orderBy('id', 'DESC')->get();
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('shooter.edit', compact('edit','clients', 'finished_goods', 'banks'));
    }

    public function update(Request $request, $id)
    {
        if($request->mode_of_payment == 1){
            $mode_of_payment = 'Cash';
        }
        else{
            if(!empty($request->bank_account)){
                $mode_of_payment = $request->bank_account;
            }
            else{
                Session::flash('error', 'Bank Account is not selected');
                return redirect()->back();
            }

        }
        $update = Shooter::find($id);
        $update->update([
            'date'=>$request->date,
            'client_id'=>$request->client_id,
            'before_shooter_qty'=>$request->before_shooter_qty,
            'after_shooter_qty'=>$request->after_shooter_qty,
            'shooter_price_per_bag'=>$request->shooter_price_per_bag,
            'shooter_total_price'=>$request->shooter_total_price,
            'excess_item'=>json_encode($request->excess_item),
            'excess_item_qty'=>json_encode($request->excess_item_qty),
            'excess_item_price_bag'=>json_encode($request->excess_item_price_bag),
            'excess_item_total_price'=>json_encode($request->excess_item_total_price),
            'total'=>$request->total,
            'payment'=>$request->payment,
            'due'=>$request->due,
            'notes'=>$request->notes,
            'mode_of_payment'=>$mode_of_payment,
        ]);
        Session::flash('success', 'Shooter is updated successfully');
        return redirect()->route('shooter.index');
    }

    public function destroy($id)
    {
        Shooter::find($id)->delete();
        Session::flash('success', 'Shooter is deleted successfully');
        return redirect()->route('shooter.index');
    }
}
