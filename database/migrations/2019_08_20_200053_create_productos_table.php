<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('producto_codigo_interno')->default('');
            $table->string('producto_codigo_proveedor')->default('');
            $table->string('producto_codigo_barras')->default('');
            $table->string('producto_imagen')->nullable();
            $table->string('producto_descripcion')->nullable();
            $table->string('producto_unidad_x_bulto')->nullable();
            $table->integer('producto_precio_venta');
            $table->integer('producto_precio_costo');
            $table->integer('fk_marca_id')->unsigned()->index()->nullable();
            $table->integer('fk_proveedor_cliente_id')->unsigned()->index();
            $table->integer('fk_rubro_id')->unsigned()->index();
            $table->integer('fk_talla_id')->unsigned()->index()->nullable();
            $table->integer('fk_color_id')->unsigned()->index()->nullable();
            $table->foreign('fk_marca_id')->references('id')->on('marcas');
            $table->foreign('fk_proveedor_cliente_id')->references('id')->on('clientes');
            $table->foreign('fk_rubro_id')->references('id')->on('rubros');
            $table->foreign('fk_talla_id')->references('id')->on('tallas');
            $table->foreign('fk_color_id')->references('id')->on('colors');
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
		//Schema::drop('productos');
	}

}
