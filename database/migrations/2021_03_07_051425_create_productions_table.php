<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{

    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('finishedgood_id')->nullable();
            $table->string('finishedgood_quantity')->nullable();
            $table->longText('rawmaterials_id')->nullable();
            $table->longText('rawmaterials_quantity')->nullable();
            $table->longText('rawmaterials_unit')->nullable();
            $table->string('warehouse_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productions');
    }
}
