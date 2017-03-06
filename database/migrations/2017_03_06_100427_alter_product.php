<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('screen')->after('alias')->nullable();
            $table->string('operationSystem')->after('screen')->nullable();
            $table->string('cpu')->after('operationSystem')->nullable();
            $table->double('ram')->after('cpu')->nullable();
            $table->date('camera')->after('ram')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('screen');
            $table->dropColumn('operationSystem');
            $table->dropColumn('cpu');
            $table->dropColumn('ram');
            $table->dropColumn('camera');
        });
    }
}
