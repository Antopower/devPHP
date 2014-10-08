<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultatsCompetitions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resultats_competitions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('resultat_id')->nullable();
			$table->unsignedInteger('participant1_id')->nullable();
			$table->unsignedInteger('participant2_id')->nullable();
			$table->float('resultat1')->nullable();
			$table->float('resultat2')->nullable();
			$table->unsignedInteger('gagnant_id')->nullable();
			$table->string('type')->nullable();
			$table->float('points')->nullable();
			$table->dateTime('date_heure')->nullable();
			$table->unsignedInteger('terrain_id')->nullable();		
			$table->boolean('finaliste')->nullable();
			$table->timestamps();
			
			$table->foreign('resultat_id')
					->references('id')
					->on('resultats')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->foreign('participant1_id')
					->references('id')
					->on('participants')
					->onDelete('restrict')
					->onUpdate('cascade');
			$table->foreign('participant2_id')
					->references('id')
					->on('participants')
					->onDelete('restrict')
					->onUpdate('cascade');
			$table->foreign('gagnant_id')
					->references('id')
					->on('participants')
					->onDelete('restrict')
					->onUpdate('cascade');
			$table->foreign('terrain_id')
					->references('id')
					->on('terrains')
					->onDelete('restrict')
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
		Schema::drop('resultats_competition');
	}

}