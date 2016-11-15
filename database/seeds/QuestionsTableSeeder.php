<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
        	'username' => "yangyue",
        	'title' => str_random(15),
        	'content' => str_random(20),
        ]);
    }
}
