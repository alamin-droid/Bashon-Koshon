<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable =[
          'date',
          'client_id',
          'retail_sell',
          'amount',
          'mode_of_payment',
          'debit',
          'debit_amount',
          'mode_of_payment_name',
          'client_name',
          'credit',
          'credit_amount',
    ];
    protected $table = 'collections';
    public function  client(){
        return $this->belongsTo('App\Client');
    }
}
