<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalidadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localidades', function(Blueprint $table) {
            $table->increments('id');
            $table->string('localidad_nombre');
            $table->integer('fk_provincia_id')->unsigned()->index()->nullable();;
            $table->foreign('fk_provincia_id')->references('id')->on('provincias');
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
		Schema::drop('localidades');
	}

}
