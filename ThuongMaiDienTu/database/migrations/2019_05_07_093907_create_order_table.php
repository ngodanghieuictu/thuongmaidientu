<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('recipientAddress',100);
            $table->float('totalPrive',8,2);
            $table->integer('idUser');
            $table->integer('idStore');
            // $table->foreign('idUser')->references('id')->on('user');
            // $table->foreign('idStore')->references('id')->on('store');
            $table->timestamps();
        });
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idOrder');
            $table->integer('idProduct');
            // $table->foreign('idOrder')->references('id')->on('order');
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
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_details');
    }
}
