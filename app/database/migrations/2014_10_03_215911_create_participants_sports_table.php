<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsSportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participants_sports', function($table)
		{
			$table->unsignedInteger('participant_id');
			$table->unsignedInteger('sport_id');
			$table->timestamps();
			
			$table->foreign('participant_id')
			->references('id')
			->on('participants')
			->onDelete('cascade')
			->onUpdate('cascade');
			
			$table->foreign('sport_id')
			->references('id')
			->on('sports')
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
		Schema::drop('participants_sports');
	}

}
