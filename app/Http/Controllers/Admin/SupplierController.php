<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Purchase;
use App\Rawmaterial;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'DESC')->paginate(10);
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:suppliers',
        ]);
        Supplier::create([
           'name'=>$request->name,
           'phone'=>$request->phone,
           'email'=>$request->email,
           'address'=>$request->address,
           'bank_account'=>$request->bank_account,
        ]);
        Session::flash('success', 'Supplier Created Successfully');
        return redirect()->route('supplier.index');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        $payments = Payment::where('supplier_id', $id)->get();
        $purchases = Purchase::where('supplier_id', $id)->get();
        return view('supplier.show', compact('supplier', 'payments', 'purchases'));
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:suppliers,email,'.$id,
        ]);
        $supplier = Supplier::find($id);
        $supplier->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'bank_account'=>$request->bank_account,
        ]);
        Session::flash('success', 'Supplier Updated Successfully');
        return redirect()->route('supplier.index');
    }

    public function destroy($id)
    {
        Supplier::find($id)->delete();
        Session::flash('success', 'Supplier Deleted Successfully');
        return redirect()->back();
    }
    public function search(Request $request){
        $input = $request->item;
        $suppliers = Supplier::where('name', 'like', "%$input%")
            ->orWhere('email', 'like', "%$input%")
            ->orWhere('phone', 'like', "%$input%")
            ->orWhere('address', 'like', "%$input%")
            ->orWhere('bank_account', 'like', "%$input%")
            ->orderBy('id', 'DESC')->paginate(10);
        return view('supplier.index', compact('suppliers'));

    }
}
