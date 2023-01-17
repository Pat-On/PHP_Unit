<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{

    public function tearDown(): void
    {

        \Mockery::close();
    }

    public function testOrderIsProcessed()
    {
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();

        // TODO: workout why this does not work - ReflectionException: Class "PaymentGateway" does not exist
        // $gateway = $this->getMockBuilder("PaymentGateway")
        //     ->addMethods(['charge'])
        //     ->getMock();


        // configuring the charge method
        $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }


    public function testOrderIsProcessedMockery()
    {
        $gateway = Mockery::mock("PaymentGateway");
        $gateway->shouldReceive("charge")
            ->once()
            ->with(200)
            ->andReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
