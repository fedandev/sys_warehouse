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
            $table->string('producto_codigo_barras')->default('')->nullable();
            $table->string('producto_imagen')->nullable();
            $table->string('procuto_nombre');
            $table->string('producto_descripcion')->nullable();
            $table->string('producto_unidad_x_bulto')->nullable();
            $table->decimal('producto_precio_venta', 20, 6)->default(0.000000);
            $table->integer('producto_cantidad_minima')->default(0);
            $table->integer('producto_cantidad_minima_web')->default(0);
            $table->tinyInteger('producto_activo')->default(0);
            $table->decimal('producto_altura', 20, 6)->default(0.000000);
            $table->decimal('producto_ancho', 20, 6)->default(0.000000);
            $table->decimal('producto_profundidad', 20, 6)->default(0.000000);
            $table->decimal('producto_peso', 20, 6)->default(0.000000);
            $table->enum('producto_condicion', ['nuevo', 'usado', 'refurbished'])->default('nuevo');
            $table->tinyInteger('producto_mostrar_precio')->default(1);
            $table->tinyInteger('producto_cantidad_minima_alerta')->default(0);
            $table->string('producto_simple')->default('Si');
            $table->integer('producto_estado')->default(1);
            $table->integer('fk_marca_id')->unsigned()->index();
            $table->foreign('fk_marca_id')->references('id')->on('marcas');
            //$table->string('producto_codigo_proveedor')->default('');
            //$table->integer('producto_precio_costo');
            //$table->integer('fk_marca_id')->unsigned()->index()->nullable();
            //$table->integer('fk_proveedor_cliente_id')->unsigned()->index();
            //$table->integer('fk_rubro_id')->unsigned()->index();
            //$table->integer('fk_talla_id')->unsigned()->index()->nullable();
            //$table->integer('fk_color_id')->unsigned()->index()->nullable();
            //$table->foreign('fk_marca_id')->references('id')->on('marcas');
            //$table->foreign('fk_proveedor_cliente_id')->references('id')->on('clientes');
            //$table->foreign('fk_rubro_id')->references('id')->on('rubros');
            //$table->foreign('fk_talla_id')->references('id')->on('tallas');
            //$table->foreign('fk_color_id')->references('id')->on('colors');
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
