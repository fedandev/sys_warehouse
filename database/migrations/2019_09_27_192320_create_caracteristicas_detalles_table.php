<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecaracteristicasDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('caracteristicas_detalles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('caracteristica_detalle_nombre')->unique();
            $table->integer('fk_caracteristica_id')->unsigned()->index();
	          $table->foreign('fk_caracteristica_id')->references('id')->on('caracteristicas');
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
		Schema::drop('caracteristicas_detalles');
	}

}
