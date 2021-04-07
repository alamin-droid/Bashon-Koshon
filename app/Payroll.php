<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
      'date',
      'month',
      'employee_id',
      'salary',
      'overtime_time',
      'overtime_amount',
      'overtime',
      'salary_deduction',
      'net_amount',
      'advance_id',
    ];

    protected $table='payrolls';

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
