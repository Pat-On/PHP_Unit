<?php


use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        require 'User.php';

        $user = new User;

        $user->first_name = "Teresa";
        $user->surname = "Green";

        $this->assertEquals('Teresa Green', $user->getFullName());
    }


    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    // it is not going to be run, because it has no test in the name 
    public function userHasFirstName()
    {
        $user = new User;

        $user->first_name = 'Teresa';


        $this->assertEquals('Teresa', $user->first_name);
    }

    /**
     * @test
     */
    public function user_has_first_name()
    {
        $user = new User;

        $user->first_name = 'Teresa';


        $this->assertEquals('Teresa', $user->first_name);
    }
}

// ./vendor/bin/phpunit tests/functionTest.php
