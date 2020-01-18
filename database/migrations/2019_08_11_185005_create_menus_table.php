<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('menu_descripcion');
            $table->integer('menu_posicion')->default(0)->index();
            $table->integer('menu_habilitado')->default(0);
            $table->string('menu_url')->nullable();
            $table->string('menu_icono')->nullable();
            $table->string('menu_formulario')->nullable();
            $table->integer('menu_padre_id')->default(0);
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
		Schema::drop('menus');
	}

}
