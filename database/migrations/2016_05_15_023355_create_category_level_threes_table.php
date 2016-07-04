<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLevelThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_level_threes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_level_two_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_level_two_id')
                ->references('id')->on('category_level_twos')
                ->onDelete('cascade');
            $table->index('id', 'category_level_two_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_level_threes');
    }
}
