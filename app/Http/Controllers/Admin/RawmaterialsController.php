<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rawmaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RawmaterialsController extends Controller
{

    public function index()
    {
        $materials = Rawmaterial::orderBy('id', 'DESC')->get();
        return view('rawmaterials.index', compact('materials'));
    }

    public function create()
    {
        return view('rawmaterials.create');
    }

    public function store(Request $request)
    {
        Rawmaterial::create([
           'name'=>$request->name,
        ]);
        Session::flash('success', 'Raw Material created Successfully');
        return redirect()->route('rawmaterials.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Rawmaterial::find($id)->delete();
        Session::flash('success', 'Raw Material Deleted Successfully');
        return redirect()->back();
    }
}
