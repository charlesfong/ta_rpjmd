<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEigenSasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eigen_sasarans', function (Blueprint $table) {
            $table->increments('id');
            $table->float('eigen')->default("0");
            $table->integer('sasaran_id')->unsigned();
            $table->foreign('sasaran_id')->references('id')->on('sasarans');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('kriteria_id')->unsigned()->nullable();
            $table->foreign('kriteria_id')->references('id')->on('kriteria_sasarans');
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
        Schema::dropIfExists('eigen_sasarans');
    }
}
