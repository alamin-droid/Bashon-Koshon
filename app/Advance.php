<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $fillable = [
      'date',
      'employee_id',
      'amount',
      'repaid_per_month',
      'total_paid',
      'due_amount',
    ];

    protected $table = 'advances';

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
