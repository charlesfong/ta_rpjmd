<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('misi',565);
            $table->integer('visi_id')->unsigned()->nullable();
            $table->foreign('visi_id')->references('id')->on('visis');
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
        $table->dropForeign(['visi_id']);
        $table->dropColumn('visi_id');
        Schema::dropIfExists('misis');
    }
}
