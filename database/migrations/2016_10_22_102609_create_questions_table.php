<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
			$table->increments('id');

			/**
			 * Specify the user ID
			 */

			$table->string('username');
			$table->string('title');
			$table->longText('content');
			$table->integer('votetimes')->default(0);
			$table->integer('readtimes')->unsigned()->default(0);
			$table->integer('answertimes')->default(0);
			$table->timestamp('published_at');
			$table->timestamps();

			/**
			 *  Foreign key generation,user_id and the article_id connect
			 */

			$table->foreign('username')
				->references('name')
				->on('users')
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
        Schema::dropIfExists('questions');
    }
}
