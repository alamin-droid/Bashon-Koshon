<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
      'date',
      'employee_id',
      'amount',
    ];

    protected $table='payrolls';

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
