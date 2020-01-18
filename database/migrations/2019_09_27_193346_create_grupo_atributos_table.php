<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreategrupoAtributosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grupo_atributos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('grupo_atributo_nombre')->unique();
            $table->string('grupo_atributo_nombre_publico')->unique();
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
		Schema::drop('grupo_atributos');
	}

}
