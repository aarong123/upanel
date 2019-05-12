<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_sale');
            $table->unsignedInteger('id_item');
            $table->foreign('id_sale')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('id_item')->references('id')->on('items');
            $table->integer('quantity');
            $table->decimal('price', 11, 2);
            $table->decimal('discount', 11, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_sales');
    }
}
