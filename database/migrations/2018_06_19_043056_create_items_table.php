<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_category');
            $table->string('code', 50)->nullable();
            $table->string('name', 100)->unique();
            $table->decimal('price_sale', 11, 2);
            $table->integer('stock');
            $table->string('description', 256)->nullable();
            $table->boolean('state')->default(1);
            $table->timestamps();

            $table->foreign('id_category')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
