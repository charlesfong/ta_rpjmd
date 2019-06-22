<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndikatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indikator',565);
            $table->string('n-2',191);
            $table->string('n',191);
            $table->string('n+1',191);
            $table->string('n+2',191);
            $table->string('n+3',191);
            $table->string('kondisi_akhir',191);
            $table->integer('sasaran_id')->unsigned()->nullable();
            $table->foreign('sasaran_id')->references('id')->on('sasarans');
            $table->integer('tujuan_id')->unsigned()->nullable();
            $table->foreign('tujuan_id')->references('id')->on('tujuans');
            $table->integer('misi_id')->unsigned()->nullable();
            $table->foreign('misi_id')->references('id')->on('misis');
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
        Schema::dropIfExists('indikators');
    }
}
