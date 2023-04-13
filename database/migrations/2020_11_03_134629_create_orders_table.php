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
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->biginteger('phone');
            $table->string('email');
            $table->string('address');
            $table->integer('pincode');
            $table->date('date');
            $table->time('time');
            $table->string('suggestion')->nullable();
            $table->string('status')->default('Pending');
            $table->boolean('payment_status')->default('0');
            $table->json('order');
            $table->string('coupon_code')->nullable();
            $table->integer('total');
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
