<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_users', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('user_category_id');
            $table->timestamps();

            $table->unique(['user_id','user_category_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_category_id')->references('id')->on('user_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_users');
    }
}
