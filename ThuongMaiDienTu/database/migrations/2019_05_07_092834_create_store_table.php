<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->integer('phone');
            $table->string('address',100);
            $table->string('description',100);
            $table->string('image',100);
            $table->timestamps();
        });
        Schema::create('store_has_product', function (Blueprint $table) {
            $table->integer('idStore');
            $table->integer('idProduct');
            // $table->foreign('idStore')->references('id')->on('store');
            // $table->foreign('idProduct')->references('id')->on('product');
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
        Schema::dropIfExists('store');
        Schema::dropIfExists('store_has_product');
    }
}
