<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->index()->nullable(false);
			$table->integer('commentable_id')->index();
			$table->text('content')->nullable(false);
			$table->text('html_content')->nullable(false);
			$table->string('commentable_type')->index();
			$table->string('username');
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
        Schema::dropIfExists('comments');
    }
}
