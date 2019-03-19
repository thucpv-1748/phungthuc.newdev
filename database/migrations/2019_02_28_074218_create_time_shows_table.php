<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('film_id')->nullable();
            $table->unsignedInteger('room_id')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('time_show')->nullable();
            $table->decimal('price',6,3)->nullable();
            $table->decimal('sale_price',6,3)->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('film_id')->references('id')->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_shows', function (Blueprint $table) {
            $table->dropForeign('time_shows_room_id_foreign');
            $table->dropForeign('time_shows_film_id_foreign');
        });
        Schema::dropIfExists('time_shows');
    }
}
