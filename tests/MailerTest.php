<?php

use PHPUnit\Framework\TestCase;

// how to test static

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send('dave@example.com', 'Hello!'));
    }
    
    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
            
        Mailer::send('', '');
    }      
}