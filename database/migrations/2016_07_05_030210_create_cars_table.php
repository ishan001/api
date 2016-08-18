<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('user_id')->unsigned();
            $table->integer('make_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->string('model_details');
            $table->integer('year')->unsigned();
            $table->integer('odometer')->unsigned();
            $table->float('price')->unsigned();
            $table->string('exterior_colour',100);
            $table->string('interior_colour',100);
            $table->integer('body_type_id')->unsigned();
            $table->integer('fuel_type_id')->unsigned();
            $table->string('cylinders',50);
            $table->string('engine_size',20);
            $table->integer('transmission_id')->unsigned();
            $table->enum('4wd', ['yes', 'no']);
            $table->string('owners',50);
            $table->string('import_history',50);
            $table->string('registration_expire',50);
            $table->string('wof_expire',50);
            $table->enum('registered', ['yes', 'no']);
            $table->string('number_plate',20);
            $table->enum('aa_report', ['yes', 'no']);
            $table->integer('post_code')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->text('description');
            $table->boolean('active');
            $table->boolean('featured');


            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('makes')
                ->onDelete('cascade');
            $table->foreign('make_id')
                ->references('id')->on('makes')
                ->onDelete('cascade');
            $table->foreign('model_id')
                ->references('id')->on('models')
                ->onDelete('cascade');
            $table->foreign('body_type_id')
                ->references('id')->on('body_types')
                ->onDelete('cascade');
            $table->foreign('fuel_type_id')
                ->references('id')->on('body_types')
                ->onDelete('cascade');
            $table->foreign('transmission_id')
                ->references('id')->on('transmissions')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');

            $table->index('city_id', 'user_id', 'make_id', 'model_id','body_type_id','fuel_type_id','transmission_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
