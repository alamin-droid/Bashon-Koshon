<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
      'date',
      'client_id',
      'type_of_rice',
      'quantity',
      'quantity_kg',
      'unit_price',
      'total_price',
      'total',
      'payment',
      'mode_of_payment',
    ];
    protected $table = 'sells';
    public function client(){
        return $this->belongsTo('App\Client');
    }
}
