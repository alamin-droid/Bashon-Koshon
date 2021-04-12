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
            $table->longText('type_of_rice')->nullable();
            $table->longText('quantity')->nullable();
            $table->longText('quantity_kg')->nullable();
            $table->longText('unit_price')->nullable();
            $table->longText('total_price')->nullable();
            $table->string('total')->nullable();
            $table->string('payment')->nullable();
            $table->string('due')->nullable();
            $table->string('notes')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
