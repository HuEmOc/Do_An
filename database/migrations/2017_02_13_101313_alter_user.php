<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->after('email')->nullable();
            $table->smallInteger('gender')->after('address')->nullable();
            $table->string('avatar')->after('gender')->nullable();
            $table->date('birthday')->after('avatar')->nullable();
            $table->integer('role')->after('birthday')->nullable();
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
            $table->dropColumn('address');
            $table->dropColumn('gender');
            $table->dropColumn('avatar');
            $table->dropColumn('birthday');
            $table->dropColumn('role');
        });
    }
}
