<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bathroom extends Controller

{
       public function bathroom(){
        return view('FrontEnd.bathroom.soapdispenser');
}


public function bf(){
    return view('FrontEnd.bathroom.bathroomfitings');
}


public function ba(){
    return view('FrontEnd.bathroom.bathroomaccessories');
}


public function dl(){
{ 
      return view('FrontEnd.bathroom.door&locks');
}
}
}