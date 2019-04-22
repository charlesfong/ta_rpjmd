<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotMisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_misis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bobot')->default("0");
            $table->integer('misi_id')->unsigned();
            $table->foreign('misi_id')->references('id')->on('misis');
            $table->integer('misi2_id')->unsigned();
            $table->foreign('misi2_id')->references('id')->on('misis');
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
        Schema::dropIfExists('bobot_misis');
    }
}
