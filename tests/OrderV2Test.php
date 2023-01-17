<?php

use PHPUnit\Framework\TestCase;

class OrderV2Test extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock()
    {
        $order = new OrderV2(3, 1.99);
        
        $this->assertEquals(5.97, $order->amount);

        // mocking
        $gateway_mock = Mockery::mock('PaymentGateway');
        
        // programing method
        $gateway_mock->shouldReceive('charge')
                     ->once()
                     ->with(5.97);                                     
                
        $order->process($gateway_mock);                
    }
    
    public function testOrderIsProcessedUsingASpy()
    {
        $order = new OrderV2(3, 1.99);
        
        $this->assertEquals(5.97, $order->amount);

        // mocking
        $gateway_spy = Mockery::spy('PaymentGateway');
        
        // calling method
        $order->process($gateway_spy);
        
        // checking what happened - spies
        $gateway_spy->shouldHaveReceived('charge')
                    ->once()
                    ->with(5.97);
    }    
}

