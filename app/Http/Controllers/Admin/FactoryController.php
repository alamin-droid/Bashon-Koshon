<?php

namespace App\Http\Controllers\Admin;

use App\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FactoryController extends Controller
{

    public function index()
    {
        $factories = Factory::orderBy('id', 'DESC')->get();
        return view('factories.index', compact('factories'));
    }

    public function create()
    {
        return view('factories.create');
    }

    public function store(Request $request)
    {
        Factory::create([
           'factory_name'=>$request->name,
           'address'=>$request->address,
           'incharge_id'=>$request->incharge_id,
        ]);
        Session::flash('success', 'Factory Created Successfully');
        return redirect()->route('factory.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $factory = Factory::find($id);
        return view('factories.edit', compact('factory'));
    }

    public function update(Request $request, $id)
    {
        $factory = Factory::find($id);
        $factory->update([
            'factory_name'=>$request->name,
            'address'=>$request->address,
            'incharge_id'=>$request->incharge_id,
        ]);
        Session::flash('success', 'Factory Updated Successfully');
        return redirect()->route('factory.index');
    }

    public function destroy($id)
    {
        Factory::find($id)->delete();
        Session::flash('success', 'Factory Deleted Successfully');
        return redirect()->back();
    }
}
