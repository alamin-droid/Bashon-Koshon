<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
      'date',
      'supplier_id',
      'product',
      'bag',
      'quantity',
      'unit_price',
      'total_price',
      'bag_price',
      'total_bag_price',
      'extra_expense',
      'total',
    ];
    protected $table = 'purchases';

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
}
