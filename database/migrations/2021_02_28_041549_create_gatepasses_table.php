<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatepassesTable extends Migration
{

    public function up()
    {
        Schema::create('gatepasses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_id')->nullable();
            $table->string('sale_id')->nullable();
            $table->string('production_id')->nullable();
            $table->string('factory_id')->nullable();
            $table->string('warehouse_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gatepasses');
    }
}
