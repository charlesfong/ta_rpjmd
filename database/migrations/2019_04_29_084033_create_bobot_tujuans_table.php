<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_tujuans', function (Blueprint $table) {
            $table->increments('id');
            $table->float('bobot')->default("0");
            $table->integer('tujuan_id')->unsigned();
            $table->foreign('tujuan_id')->references('id')->on('tujuans');
            $table->integer('tujuan2_id')->unsigned();
            $table->foreign('tujuan2_id')->references('id')->on('tujuans');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('kriteria_id')->unsigned()->nullable();
            $table->foreign('kriteria_id')->references('id')->on('kriteria_tujuans');
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
        Schema::dropIfExists('bobot_tujuans');
    }
}
