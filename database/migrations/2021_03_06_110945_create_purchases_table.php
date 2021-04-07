<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{

    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->longtext('rawmaterial_id')->nullable();
            $table->longtext('quantity')->nullable();
            $table->longtext('unit')->nullable();
            $table->longtext('rate_per_unit')->nullable();
            $table->longtext('supplier_id')->nullable();
            $table->longtext('warehouse_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
