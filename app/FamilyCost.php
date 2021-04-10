<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyCost extends Model
{
    protected $fillable = [
        'date',
        'cost_for',
        'amount',
        'mode_of_payment',
        'debit',
        'debit_amount',
        'mode_of_payment_name',
        'credit',
        'credit_amount',
    ];
    protected $table = 'family_costs';
}
