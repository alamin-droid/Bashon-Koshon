<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContraJournalsTable extends Migration
{

    public function up()
    {
        Schema::create('contra_journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('transfer_from')->nullable();
            $table->string('amount')->nullable();
            $table->string('transfer_to')->nullable();
            $table->string('transfer_amount_to')->nullable();
            $table->string('debit')->nullable();
            $table->string('debit_amount')->nullable();
            $table->string('transfer_amount_from')->nullable();
            $table->string('credit')->nullable();
            $table->string('credit_amount')->nullable();
            $table->string('details')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contra_journals');
    }
}
