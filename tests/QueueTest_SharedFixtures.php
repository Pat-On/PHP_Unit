<?php

use PHPUnit\Framework\TestCase;

class QueueTest_SharedFixtures extends TestCase

{
    protected static $queue;
    // https://phpunit.readthedocs.io/en/9.5/fixtures.html
    protected function setUp(): void
    {
        // before each test
        // $this->queue = new Queue;
        static::$queue->clear();
    }

    protected function tearDown(): void
    {
        // cleaning after each test 
        // used when you are creating external resources, most of the time it is not needed to use <- comment from tutor
        // unset($this->queue);
    }

    public static function setUpBeforeClass(): void
    {
        // in this place we a re going to do the things what require a lot of resources and share them 
        // this object is shared between objects
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        // at this place you would disconnect from the server etc
        static::$queue = null;
    }


    public function testNewQueueIsEmpty()
    {

        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {

        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {

        static::$queue->push('green');

        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');


        $this->assertEquals('first', static::$queue->pop());
    }
}
