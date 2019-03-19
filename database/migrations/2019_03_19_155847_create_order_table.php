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
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('coupon_id')->nullable();
            $table->unsignedInteger('time_show_id')->nullable();
            $table->string('fast_food_ids')->nullable();
            $table->string('seat')->nullable();
            $table->string('status')->nullable();
            $table->decimal('total_price',6,3)->nullable();
            $table->decimal('sale_price',6,3)->nullable();
            $table->decimal('final_price',6,3)->nullable();
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_user_id_foreign');
            $table->dropForeign('orders_coupon_id_foreign');
            $table->dropForeign('orders_time_show_id_foreign');
        });
        Schema::dropIfExists('orders');
    }
}
