<?php

use PHPUnit\Framework\TestCase;

class QueueTest_v2 extends TestCase
{
    public function testNewQueueIsEmpty() // producer
    {
        $queue = new Queue;
        
        $this->assertEquals(0, $queue->getCount());        

        return $queue;
    }
    

    /**
     * 
     * @depends testNewQueueIsEmpty
     * 
     */
    public function testAnItemIsAddedToTheQueue(Queue $queue) // consumer
    {
        // $queue = new Queue;
        
        $queue->push('green');
        
        $this->assertEquals(1, $queue->getCount());      
        
        return $queue;
    }
    

    /**
     *  @depends testAnItemIsAddedToTheQueue
     * 
     */
    public function testAnItemIsRemovedFromTheQueue(Queue $queue)
    {
        // $queue = new Queue;
        
        // $queue->push('green');
        
        $item = $queue->pop();
        
        $this->assertEquals(0, $queue->getCount());
        
        $this->assertEquals('green', $item);                                        
    }    
}