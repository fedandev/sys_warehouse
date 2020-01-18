<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateatributoProductoAtributosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atributo_producto_atributo', function(Blueprint $table) {
            $table->integer('fk_atributo_id')->unsigned();
            $table->integer('fk_producto_atributo')->unsigned();
      
            $table->foreign('fk_atributo_id')->references('id')->on('atributos');
            $table->foreign('fk_producto_atributo')->references('id')->on('producto_atributos');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('atributo_producto_atributos');
	}

}
