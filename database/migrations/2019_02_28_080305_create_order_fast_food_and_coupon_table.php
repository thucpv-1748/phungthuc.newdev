<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderFastFoodAndCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->DECIMAL('price',6,3)->nullable();
            $table->integer('percent')->nullable();
            $table->timestamps();
        });


        Schema::create('fast_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->DECIMAL('price',6,3)->nullable();
        });


        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('coupon_id')->nullable();
            $table->unsignedInteger('time_show_id')->nullable();
            $table->string('fast_food_ids')->nullable();
            $table->string('seat')->nullable();
            $table->string('status')->nullable();
            $table->DECIMAL('total_price',6,3)->nullable();
            $table->DECIMAL('sale_price',6,3)->nullable();
            $table->DECIMAL('final_price',6,3)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->foreign('time_show_id')->references('id')->on('time_shows');
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
        Schema::dropIfExists('fast_foods');
        Schema::dropIfExists('coupons');

    }
}
