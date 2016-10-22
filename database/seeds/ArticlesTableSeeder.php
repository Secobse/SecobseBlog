<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the table Articles seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('questions')->insert([
    		'title' => str_random(10),
    		'content' => str_random(10),
    		'user_id' =>1,
             ]);
             DB::table('questions')->insert([
                            'title' => str_random(10),
                            'content' => str_random(10),
                            'user_id' =>2,
              ]);

    }
}
