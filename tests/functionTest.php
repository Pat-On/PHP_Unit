<?php

// https://phpunit.readthedocs.io/en/9.5/assertions.html

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
        require "functions.php";

        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(3, 5));
    }

    public function testAddDoesNotReturnTheIncorrectSum(){
        $this->assertNotEquals(5, add(2,2));
    }
}

//  ./vendor/bin/phpunit tests/functionTest.php