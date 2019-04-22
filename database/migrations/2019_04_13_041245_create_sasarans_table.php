<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sasarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sasaran',565);
            $table->integer('tujuan_id')->unsigned()->nullable();
            $table->foreign('tujuan_id')->references('id')->on('tujuans');
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
        $table->dropForeign(['tujuan_id']);
        $table->dropColumn('tujuan_id');
        Schema::dropIfExists('sasarans');
    }
}
