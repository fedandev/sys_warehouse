<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateatributosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atributos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('atributo_color')->nullable();
            $table->integer('atributo_posicion');
            $table->string('atributo_nombre')->unique();
            $table->integer('fk_grupo_atributo_id')->unsigned()->index();
            $table->foreign('fk_grupo_atributo_id')->references('id')->on('grupo_atributos');;
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
		Schema::drop('atributos');
	}

}
