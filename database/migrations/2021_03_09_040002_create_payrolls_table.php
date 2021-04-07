<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{

    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('overtime_time')->nullable();
            $table->string('overtime_amount')->nullable();
            $table->string('overtime')->nullable();
            $table->string('salary_deduction')->nullable();
            $table->string('net_amount')->nullable();
            $table->longText('advance_id')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
