<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRawProduct extends Model
{
    protected $fillable = [
      'product_name',
      'quantity',
      'quantity_kg',
    ];
    protected $table = 'client_raw_products';
}
