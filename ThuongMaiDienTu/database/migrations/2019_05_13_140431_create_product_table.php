<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('description',150);
            $table->string('brand',50);
            $table->integer('sale')->nullable();
            $table->float('price');
            $table->integer('count');
            $table->integer('id_category');
            $table->timestamps();
        });
        Schema::create('productTranslation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('products_id');
            $table->string('lang',10);
            $table->string('name',100);
            $table->string('description',150);
            $table->string('brand',50);
            
            $table->timestamps();
        });
        Schema::create('imageProduct', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image',200);
            $table->integer('products_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('productDetail');
        Schema::dropIfExists('imageProduct');
    }
}
