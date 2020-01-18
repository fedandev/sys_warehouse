<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatestocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('stock_cantidad');
            $table->integer('fk_producto_id')->unsigned()->index();
            $table->integer('fk_sucursals_id')->unsigned()->index();
            $table->foreign('fk_producto_id')->references('id')->on('productos');
            $table->foreign('fk_sucursals_id')->references('id')->on('sucursals');
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
		Schema::drop('stocks');
	}

}
