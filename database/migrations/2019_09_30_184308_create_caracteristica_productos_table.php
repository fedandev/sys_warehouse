<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecaracteristicaProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('caracteristicas_detalle_producto', function(Blueprint $table) {
            $table->integer('producto_id')->unsigned()->index();;
            $table->integer('caracteristicas_detalle_id')->unsigned()->index();;
            
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('caracteristicas_detalle_id')->references('id')->on('caracteristicas_detalles');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('caracteristica_productos');
	}

}
