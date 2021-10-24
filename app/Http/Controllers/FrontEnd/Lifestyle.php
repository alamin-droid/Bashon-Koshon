<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Lifestyle extends Controller
{
    public function tablecloth(){
        return view('FrontEnd.Lifestyle.tablecloth');
}
public function homedecor(){
    return view('FrontEnd.Lifestyle.homedecor');
}
public function bedset(){
    return view('FrontEnd.Lifestyle.bedset');
}
public function cf(){
    return view('FrontEnd.Lifestyle.canfurniture');
}
public function wf(){
    return view('FrontEnd.Lifestyle.woodfurnuture');
}
public function wc(){
    return view('FrontEnd.Lifestyle.woodcrafe');
}


}
