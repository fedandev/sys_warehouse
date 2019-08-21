<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAjustesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ajustes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ajuste_nombre');
            $table->string('ajuste_valor')->nullable();
            $table->string('ajuste_descripcion')->nullable();
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
		Schema::drop('ajustes');
	}

}
