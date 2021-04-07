<?php

namespace App\Http\Controllers\Admin;

use App\Finishedgood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FinishedgoodController extends Controller
{

    public function index()
    {
        $goods = Finishedgood::orderBy('id', 'DESC')->get();
        return view('finishedgood.index', compact('goods'));
    }

    public function create()
    {
        return view('finishedgood.create');
    }

    public function store(Request $request)
    {
        Finishedgood::create([
           'name'=>$request->name,
        ]);
        Session::flash('success', 'Finished Good Created Successfully');
        return redirect()->route('finishedgood.index');
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
        Finishedgood::find($id)->delete();
        Session::flash('success', 'Finished Good Deleted Successfully');
        return redirect()->back();
    }
}
