<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyCostsTable extends Migration
{

    public function up()
    {
        Schema::create('family_costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('cost_for')->nullable();
            $table->string('amount')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('debit')->nullable();
            $table->string('debit_amount')->nullable();
            $table->string('mode_of_payment_name')->nullable();
            $table->string('credit')->nullable();
            $table->string('credit_amount')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('family_costs');
    }
}
