<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolesToUserCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_categories', function (Blueprint $table) {
            $table->string('slug')->unique();
            $table->string('permissions')->default('{}');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_categories', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('permissions');
        });
    }
}
