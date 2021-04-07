<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawmaterial extends Model
{
    protected $fillable = [
      'name',
    ];
    protected $table = 'rawmaterials';
}
