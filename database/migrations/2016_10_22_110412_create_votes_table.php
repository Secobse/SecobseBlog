<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function (Blueprint $table) {

			$table->engine = 'InnoDB';

			$table->string('user');
			$table->integer('questionId')->unsigned();

			$table->foreign('user')
				->references('name')
				->on('users')
				->onDelete('cascade');

			$table->foreign('questionId')
				->references('id')
				->on('questions')
				->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votes');
	}
}
