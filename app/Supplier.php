<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
      'name',
      'phone',
      'email',
      'address',
      'bank_account',
    ];
    protected $table = 'suppliers';
}
