<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * Run user test.
     *
     * @return void
     */
    public function testRegister()
    {
    	$this->visit('/register')
    		 ->type('yy', 'name')
    		 ->type('test@test.com', 'email')
    		 ->type('000000a', 'password')
    		 ->type('000000a', 'password_confirmation')
    		 ->press('Register')
    		 ->seePageIs('/home');
    }

    public function testLogin()
    {
        $this->visit('/login')
             ->type('G1enY0ung', 'name')
             ->type('000000a', 'password')
             ->press('Login')
             ->seePageIs('/home');
    }
}
