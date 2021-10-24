<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function index(){
        return view('FrontEnd.kitchen.index');
    }
    public function cookware(){
        return view ('FrontEnd.kitchen.cookware');
        
    }
    public function fryinpan(){
        return view  ('FrontEnd.kitchen.fryinpan'); 
    }
    public function kitchenstore(){
        return view  ('FrontEnd.kitchen.kitchenstore'); 
    }
    public function dishrak(){
        return view  ('FrontEnd.kitchen.DishRak&Drainer'); 
    }
    public function foodbox(){
        return view  ('FrontEnd.kitchen.foodcontantstor'); 
    }
    public function pressurecooker(){
        return view  ('FrontEnd.kitchen.pressurecooker'); 
    }
    public function tawa(){
        return view  ('FrontEnd.kitchen.tawa'); 
    }
    public function hotpot(){
        return view  ('FrontEnd.kitchen.hotpot'); 
    }
    public function tiffinbox(){
        return view  ('FrontEnd.kitchen.Stainsteltifin'); 
    }
   
  
}
