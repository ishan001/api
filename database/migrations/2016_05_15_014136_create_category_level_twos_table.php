<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLevelTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_level_twos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_level_one_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_level_one_id')
                ->references('id')->on('category_level_ones')
                ->onDelete('cascade');

            $table->index('id', 'category_level_one_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_level_twos');
    }
}
