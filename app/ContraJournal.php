<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContraJournal extends Model
{
    protected $fillable = [
        'date',
        'transfer_from',
        'amount',
        'transfer_to',
        'transfer_amount_to',
        'debit',
        'debit_amount',
        'transfer_amount_from',
        'credit',
        'credit_amount',
        'details',
    ];
    protected $table = 'contra_journals';
}
