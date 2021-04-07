<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
            'photo',
            'name',
            'c_person',
            'address',
            'email',
            'phone',
            'due',
            'payment',
            'balance',
    ];
    protected $table = 'clients';
}
