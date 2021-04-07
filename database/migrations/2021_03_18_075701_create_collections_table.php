<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{

    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('client_id')->nullable();
            $table->string('retail_sell')->nullable();
            $table->string('amount')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('debit')->nullable();
            $table->string('debit_amount')->nullable();
            $table->string('mode_of_payment_name')->nullable();
            $table->string('client_name')->nullable();
            $table->string('credit')->nullable();
            $table->string('credit_amount')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
