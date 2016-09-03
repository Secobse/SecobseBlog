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

            $table->integer('userId')->unsigned();
            $table->integer('articleId')->unsigned();

            $table->foreign('userId')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('articleId')
                  ->references('id')
                  ->on('articles')
                  ->onDelete('cascade');

            $table->boolean('isVote')->default(0);
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
        Schema::drop('votes');
    }
}
