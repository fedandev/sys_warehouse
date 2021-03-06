<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provincias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('provincia_nombre');
            $table->integer('fk_pais_id')->unsigned()->index()->nullable();;
            $table->foreign('fk_pais_id')->references('id')->on('pais');
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
		Schema::drop('provincias');
	}

}
