<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasureMalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_males', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index('fk_measure_males_users_1_idx');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('bshape')->unsigned();
            $table->integer('neck')->unsigned();
            $table->integer('chest')->unsigned();
            $table->integer('sleeve')->unsigned();
            $table->integer('waist')->unsigned();
            $table->integer('hips')->unsigned();
            $table->integer('inseam')->unsigned();
            $table->integer('measure_unit_id')->unsigned();
            $table->foreign('measure_unit_id')->references('id')->on('measure_units');
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
        Schema::dropIfExists('measure_males');
    }
}
