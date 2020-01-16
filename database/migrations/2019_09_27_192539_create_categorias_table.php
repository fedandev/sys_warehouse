<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecategoriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_padre')->default(0);
            $table->integer('categoria_activo')->default(1);
            $table->integer('categoria_posicion')->nullable();
            $table->string('categoria_nombre')->unique();
            $table->string('categoria_descripcion')->nullable();
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
		Schema::drop('categorias');
	}

}
