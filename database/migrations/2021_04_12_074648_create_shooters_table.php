<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShootersTable extends Migration
{

    public function up()
    {
        Schema::create('shooters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('client_id')->nullable();
            $table->string('before_shooter_qty')->nullable();
            $table->string('after_shooter_qty')->nullable();
            $table->string('shooter_price_per_bag')->nullable();
            $table->string('shooter_total_price')->nullable();
            $table->longText('excess_item')->nullable();
            $table->longText('excess_item_qty')->nullable();
            $table->longText('excess_item_price_bag')->nullable();
            $table->longText('excess_item_total_price')->nullable();
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
        Schema::dropIfExists('shooters');
    }
}
