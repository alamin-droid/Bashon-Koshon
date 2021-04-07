<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gatepass extends Model
{
    protected $fillable = [
      'purchase_id',
      'sale_id',
      'production_id',
      'factory_id',
      'warehouse_id',
    ];
    protected $table = 'gatepasses';

    public function factory(){
        return $this->belongsTo('App\Factory');
    }
    public function purchase(){
        return $this->belongsTo('App\Purchase');
    }
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
    public function production(){
        return $this->belongsTo('App\Production');
    }
}
