<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('resultats', function($table)
		{
			$table->increments('id');
			$table->string('nom');
			$table->unsignedInteger('epreuve_id')->nullable();
			$table->boolean('finale');
			$table->integer('division')->nullable();
			$table->char('section',1)->nullable();
			$table->timestamps();
			
			$table->foreign('epreuve_id')
				->references('id')
				->on('epreuves')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resultats');
	}
		

}
