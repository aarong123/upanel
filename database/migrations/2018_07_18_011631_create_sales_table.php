<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_client');
            //$table->foreign('id_client')->references('id')->on('persons'); volver a migrar
            $table->unsignedInteger('id_user');
            //$table->foreign('id_user')->references('id')->on('users'); volver a migrar
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
        Schema::dropIfExists('sales');
    }
}
