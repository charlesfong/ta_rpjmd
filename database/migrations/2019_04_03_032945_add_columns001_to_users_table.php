<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns001ToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->dropColumn('email');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('user_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->dropColumn('username');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
