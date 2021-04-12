<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRawProductsTable extends Migration
{

    public function up()
    {
        Schema::create('client_raw_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('quantity_kg')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('client_raw_products');
    }
}
