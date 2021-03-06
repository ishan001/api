<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->integer('make_id')->unsigned();
            $table->timestamps();

            $table->foreign('make_id')
                ->references('id')->on('makes')
                ->onDelete('cascade');

            $table->index('id', 'make_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('make_models');
    }
}
