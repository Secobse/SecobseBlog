<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * Run user register test.
     *
     * @return void
     */
    public function testRegister()
    {
    	$this->visit('/register')
    		 ->type('lei', 'name')
    		 ->type('fantonglei@vip.qq.com', 'email')
    		 ->type('123456', 'password')
    		 ->type('123456', 'password_confirmation')
    		 ->press('Register')
    		 ->seePageIs('/home');
    }

    /**
     * Run user login test.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('/login')
             ->type('lei', 'name')
             ->type('123456', 'password')
             ->press('Login')
             ->seePageIs('/home');
    }
}
