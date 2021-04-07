<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
      'bank_name',
      'branch',
      'account',
    ];
    protected $table = 'banks';
}
