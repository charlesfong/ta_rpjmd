<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tujuan',565);
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
        $table->dropForeign(['misi_id']);
        $table->dropColumn('misi_id');
        Schema::dropIfExists('tujuans');
    }
}
