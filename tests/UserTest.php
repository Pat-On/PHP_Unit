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
        $mock_mailer->expects($this->once()) // expect method to be call once and only once
            ->method('sendMessage')
            // expected number of params and theirs values
            ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = "dave@example.com";

        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User;

        // $mock_mailer = $this->createMock(Mailer::class);

        // we can use original class, because we are going to throw only exception
        // $mock_mailer->method('sendMessage')->will($this->throwException(new Exception));

        // https://phpunit.readthedocs.io/en/9.5/test-doubles.html
        // setMethods is deprecate
        // $mock_mailer = $this->getMockBuilder(Mailer::class)
        //     ->setMethods(null)
        //     ->getMock();

        // This still uses setMethods in PHPUnit 9.3.8, but it must be passed an empty array
        $mock_mailer = $this->createPartialMock(Mailer::class, []);


        // This way appears to allow all original methods to be accessed
        // $mock_mailer = $this->getMockBuilder(Mailer::class)
        //     ->enableProxyingToOriginalMethods()
        //     ->getMock();

        // This way seems align the most with how the lecture was handling things, but must be passed an empty array as null will throw a TypeError
        // $mock_mailer = $this->getMockBuilder(Mailer::class)
        //     ->onlyMethods([])
        //     ->getMock();


        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $user->notify("Hello");
    }
}

// ./vendor/bin/phpunit tests/functionTest.php
