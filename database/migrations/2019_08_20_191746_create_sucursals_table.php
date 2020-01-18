<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sucursals', function(Blueprint $table) {
            $table->increments('id');
            $table->string('sucursal_nombre');
            $table->integer('fk_localidad_id')->unsigned()->index();
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
		Schema::drop('sucursals');
	}

}
