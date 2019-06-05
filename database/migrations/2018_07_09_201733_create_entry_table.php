<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('provider_id');
            $table->unsignedInteger('user_id');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('type_voucher', 20);
            $table->string('series_voucher', 7)->nullable();
            $table->string('num_voucher', 10);
            $table->decimal('tax', 4, 2);
            $table->decimal('total', 11, 2);
            $table->string('state', 20);
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
        Schema::dropIfExists('entries');
    }
}
