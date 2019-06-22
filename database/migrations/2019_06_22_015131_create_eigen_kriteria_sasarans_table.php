<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEigenKriteriaSasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eigen_kriteria_sasarans', function (Blueprint $table) {
            $table->increments('id');
            $table->float('eigen')->default("0");
            $table->integer('kriteria_id')->unsigned();
            $table->foreign('kriteria_id')->references('id')->on('kriteria_sasarans');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('eigen_kriteria_sasarans');
    }
}
