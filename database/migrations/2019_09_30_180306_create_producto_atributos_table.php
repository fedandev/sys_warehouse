<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateproductoAtributosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('producto_atributos', function(Blueprint $table) {
            $table->increments('id');
            $table->decimal('producto_atributo_alto', 20, 6)->default(0.000000);
            $table->decimal('producto_atributo_ancho', 20, 6)->default(0.000000);
            $table->decimal('producto_atributo_profundidad', 20, 6)->default(0.000000);
            $table->decimal('producto_atributo_peso', 20, 6)->default(0.000000);
            $table->integer('producto_atributo_default')->default(0);
            $table->integer('producto_atributo_cantidad_minima')->default(0);
            $table->integer('producto_atributo_cantidad_minima_alerta')->default(0);
            $table->integer('fk_producto_id')->unsigned()->index();
            $table->timestamps();
      
            $table->foreign('fk_producto_id')->references('id')->on('productos');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('producto_atributos');
	}

}
