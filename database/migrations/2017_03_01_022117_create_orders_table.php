<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',60);
                $table->string('email',100);
                $table->string('phone',60);
                $table->string('address',60);
                $table->integer('status');
                $table->integer('total_qty');
                $table->integer('total_price');
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
        Schema::dropIfExists('orders');
    }
}
