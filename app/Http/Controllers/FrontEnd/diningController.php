<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class diningController extends Controller
{
    public function index(){
        return view  ('FrontEnd.dining.index'); 
    }
    public function dinner(){
        return view  ('FrontEnd.dining.DinnerSet'); 
    }
    public function FullSet(){
        return view  ('FrontEnd.dining.FullPlateSet'); 
    }
    public function buffet(){
        return view  ('FrontEnd.dining.chafingDish'); 
    }
    public function casserole(){
        return view  ('FrontEnd.dining.CasseroleDishes'); 
    }
    public function serve(){
        return view  ('FrontEnd.dining.ServeWare'); 
    }
    public function Cakeserve(){
        return view  ('FrontEnd.dining.CakeServingPlate'); 
    }
    public function waterbottle(){
        return view  ('FrontEnd.dining.WaterBottle'); 
    }
    public function jug(){
        return view  ('FrontEnd.dining.jug&jugSet'); 
    }
    public function  CupSet(){
        return view  ('FrontEnd.dining.CupSet'); 
    }
    public function teacoffi(){
        return view  ('FrontEnd.dining.TeaCoffiMug'); 
    }
    public function kettlytea(){
        return view  ('FrontEnd.dining.KettleTeaPot'); 
    }
    public function calyset(){
        return view  ('FrontEnd.dining.CalySet'); 
    }
}
