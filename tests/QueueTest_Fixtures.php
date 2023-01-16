<?php

use PHPUnit\Framework\TestCase;

class QueueTest_Fixtures extends TestCase

{
    protected $queue;
    // https://phpunit.readthedocs.io/en/9.5/fixtures.html
    protected function setUp(): void
    {
        // before each test
        $this->queue = new Queue;
    }

    protected function tearDown(): void
    {
        // cleaning after each test 
        // used when you are creating external resources, most of the time it is not needed to use <- comment from tutor
        unset($this->queue);
    }

    public function testNewQueueIsEmpty()
    {

        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {

        $this->queue->push('green');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {

        $this->queue->push('green');

        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');


        $this->assertEquals('first', $this->queue->pop());
    }
}
