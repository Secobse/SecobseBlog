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
            $table->integer('articleId')->unsigned();
            $table->foreign('user')
                  ->references('name')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('articleId')
                  ->references('id')
                  ->on('articles')
                  ->onDelete('cascade');
            $table->boolean('isVote')->default(0);
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