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
            $table->string('employee_id')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
