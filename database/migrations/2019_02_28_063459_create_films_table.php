<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->string('language')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('status')->nullable();
            $table->integer('time')->nullable();
            $table->date('fist_show')->nullable();
            $table->string('director')->nullable();
            $table->string('actor')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
