<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'date',
      'supplier_id',
      'due_amount',
      'amount',
      'mode_of_payment',
      'debit',
      'debit_amount',
      'mode_of_payment_name',
      'credit',
      'credit_amount',
    ];
    protected $table = 'payments';

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
}
