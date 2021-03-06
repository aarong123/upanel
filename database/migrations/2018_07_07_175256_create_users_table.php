<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->foreign('id')->references('id')->on('persons')->onDelete('cascade');
            $table->string('user')->unique();
            $table->string('password');
            $table->boolean('state')->default(1);
            $table->unsignedInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->softDeletes();
            $table->rememberToken();
        });
        DB::table('users')->insert(array('id' => '1',
            'user' => 'administrador',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
            'role_id' => '1',
        ));
        DB::table('users')->insert(array('id' => '2',
            'user' => 'almacenero',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
            'role_id' => '3',
        ));
        DB::table('users')->insert(array('id' => '3',
            'user' => 'vendedor',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
            'role_id' => '2',
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
