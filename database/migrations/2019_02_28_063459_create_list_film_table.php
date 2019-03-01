<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_film', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('language')->nullable();
            $table->string('status');
            $table->integer('time')->nullable();;
            $table->date('fist_show')->nullable();
            $table->string('film_director')->nullable();
            $table->unsignedInteger('id_category');
            $table->foreign('id_category')->references('id')->on('category');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_film');
    }
}
