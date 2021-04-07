<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = [
      'date',
      'finishedgood_id',
      'finishedgood_quantity',
      'rawmaterials_id',
      'rawmaterials_quantity',
      'rawmaterials_unit',
      'warehouse_id',
      'status',
    ];
    protected $table = 'productions';
    public function rawmaterial(){
        return $this->belongsTo('App\Rawmaterial');
    }
    public function finishedgood(){
        return $this->belongsTo('App\Finishedgood');
    }
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
}
