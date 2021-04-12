<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shooter extends Model
{
    protected $fillable = [
      'date',
      'client_id',
      'before_shooter_qty',
      'after_shooter_qty',
      'shooter_price_per_bag',
      'shooter_total_price',
      'excess_item',
      'excess_item_qty',
      'excess_item_price_bag',
      'excess_item_total_price',
      'total',
      'payment',
      'due',
      'notes',
      'mode_of_payment',
    ];
    protected $table = 'shooters';
    public function client(){
        return $this->belongsTo('App\Client');
    }
}
