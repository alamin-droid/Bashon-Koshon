<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
      'employee_id',
      'date',
      'in_time',
      'out_time',
      'total_time',
    ];

    protected $table = 'attendances';

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
