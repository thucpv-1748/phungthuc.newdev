<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListShowFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_show_film', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_film');
            $table->unsignedInteger('id_room');
            $table->string('status');
            $table->dateTime('datetime_show');
            $table->DECIMAL('price_ticket',6,3);
            $table->DECIMAL('sale_price',6,3);
            $table->foreign('id_room')->references('id')->on('room');
            $table->foreign('id_film')->references('id')->on('list_film');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_show_film');
    }
}
