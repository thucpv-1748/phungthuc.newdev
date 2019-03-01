<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_order');
            $table->unsignedInteger('id_show');
            $table->string('row');
            $table->string('number');
            $table->timestamps();
            $table->foreign('id_order')->references('id')->on('order');
            $table->foreign('id_show')->references('id')->on('list_show_film');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_order');
    }
}
