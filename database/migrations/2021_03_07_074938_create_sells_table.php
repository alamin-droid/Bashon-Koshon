<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{

    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('client_id')->nullable();
            $table->string('retail_sell')->nullable();
            $table->longtext('finishedgood_id')->nullable();
            $table->longtext('quantity')->nullable();
            $table->longtext('rate_per_unit')->nullable();
            $table->longtext('status')->nullable();
            $table->longtext('warehouse_id')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
