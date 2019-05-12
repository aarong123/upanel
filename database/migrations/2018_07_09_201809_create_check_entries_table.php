<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('id_entry');
            $table->UnsignedInteger('id_item');
            $table->foreign('id_entry')->references('id')->on('entries')->onDelete('cascade');
            $table->foreign('id_item')->references('id')->on('items');
            $table->integer('quantity');
            $table->decimal('price', 11, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_entries');
    }
}
