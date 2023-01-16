<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {

        // mocking class - method are doing nothing just return null
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            // changing returned value to true 
            ->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        $this->assertTrue($result);
    }
}
