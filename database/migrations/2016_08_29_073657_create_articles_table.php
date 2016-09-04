<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            /**
             * Specify the user ID
             */
            $table->string('username');
            $table->string('title');
            $table->longText('content');
            $table->integer('love')->unsigned()->default(0);
            $table->integer('unLove')->unsigned()->default(0);
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
        Schema::drop('articles');
    }
}