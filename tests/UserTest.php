<?php

use PHPUnit\Framework\TestCase;

// one way of using autoload <- not  recommended
// require './vendor/autoload.php';
// or
// you can use bootstrap
// ./vendor/bin/phpunit --bootstrap="./vendor/autoload.php"

// important composer dump-autoload

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        // require 'User.php';

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

    public function testNotificationIsSent()
    {
        $user = new User;

        // mocking class
        $mock_mailer = $this->createMock(Mailer::class);

        // modifying default null return of the mocked class
        $mock_mailer->method('sendMessage')
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = "dave@example.com";

        $this->assertTrue($user->notify("Hello"));
    }
}

// ./vendor/bin/phpunit tests/functionTest.php
