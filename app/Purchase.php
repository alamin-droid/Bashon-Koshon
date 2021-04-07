<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
      'date',
      'rawmaterial_id',
      'quantity',
      'unit',
      'rate_per_unit',
      'supplier_id',
      'warehouse_id',
      'status',
    ];
    protected $table = 'purchases';

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
    public function rawmaterial(){
        return $this->belongsTo('App\Rawmaterial');
    }
}
