<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();//order id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Payment Data
            $table->string('total');//amount
            $table->text('currency');
            $table->string('description');
            $table->string('status');//status of order
            //userInfo Data 
            $table->string('phone');
            $table->text('country');
            $table->string('city');
            $table->text('address');
            $table->string('quantity');

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
    }
}
