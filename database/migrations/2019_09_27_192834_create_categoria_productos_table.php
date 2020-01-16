<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecategoriaProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria_productos', function(Blueprint $table) {
            $table->integer('categoria_producto_posicion');
            $table->integer('fk_producto_id')->unsigned()->index();
            $table->integer('fk_categoria_id')->unsigned()->index();
            $table->primary(['fk_categoria_id', 'fk_producto_id']);
            $table->foreign('fk_categoria_id')->references('id')->on('categorias');
            $table->foreign('fk_producto_id')->references('id')->on('productos');
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
		Schema::drop('categoria_productos');
	}

}
