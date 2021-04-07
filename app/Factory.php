<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $fillable = [
      'factory_name',
      'address',
      'incharge_id',
    ];
    protected $table = 'factories';

}
