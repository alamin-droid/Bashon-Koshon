<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
      'date',
      'client_id',
      'retail_sell',
      'finishedgood_id',
      'quantity',
      'rate_per_unit',
      'status',
      'warehouse_id',
    ];
    protected $table = 'sells';
    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function finishedgood(){
        return $this->belongsTo('App\Finishedgood');
    }
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
}
