<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('cliente_RUC')->index()->nullable();
            $table->string('cliente_cedula')->index()->nullable();
            $table->string('cliente_nombre');
            $table->string('cliente_apellido');
            $table->string('cliente_direccion')->default('');
            $table->string('cliente_telefono1')->default(0);
            $table->string('cliente_telefono2')->default('');
            $table->string('cliente_calle')->default('');
            $table->integer('fk_localidad_id')->unsigned()->index()->nullable();
            $table->foreign('fk_localidad_id')->references('id')->on('localidades');
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
		Schema::drop('clientes');
	}

}
