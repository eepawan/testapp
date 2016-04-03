<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    //use DatabaseMigrations;
    //use DatabaseTransactions;


    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Welcome');
    }

    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('Taylor', 'name')
            ->type('Taylor@abc.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/home');
    }

    public function testUserLogin()
    {
        $this->visit('/login')
            ->type('Taylor@abc.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }

}
