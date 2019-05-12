<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatepersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('type_doc', 20)->nullable();
            $table->string('num_doc', 20)->nullable();
            $table->string('address', 70)->nullable();
            $table->string('telephone', 70)->nullable();
            $table->string('email', 50)->nullable();
            $table->timestamps();
        });
        DB::table('persons')->insert(array(
            'id' => '1',
            'name' => 'Administrador',
            'lastname' => 'Administrador',
        ));
        DB::table('persons')->insert(array(
            'id' => '2',
            'name' => 'Almacenero',
            'lastname' => 'Almacenero',
        ));
        DB::table('persons')->insert(array(
            'id' => '3',
            'name' => 'Vendedor',
            'lastname' => 'Vendedor',
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
