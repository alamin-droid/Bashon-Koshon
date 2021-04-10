<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'date',
        'item_name',
        'amount',
        'mode_of_payment',
        'debit',
        'debit_amount',
        'mode_of_payment_name',
        'credit',
        'credit_amount',
    ];
    protected $table = 'expenses';
}
