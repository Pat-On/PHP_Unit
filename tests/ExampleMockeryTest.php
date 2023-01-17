<?php

use PHPUnit\Framework\TestCase;
// use Mockery\Adapter\Phpunit\MockeryTestCase;

// http://docs.mockery.io/en/latest/reference/phpunit_integration.html
class ExampleMockeryTest extends TestCase
{
    public function tearDown(): void
    {

        \Mockery::close();
    }

    public function testSomething(): void
    {
        // Optional: Test anything here, if you want.
        $this->assertTrue(true, 'This should already work.');

        // Stop here and mark this test as incomplete.
        // $this->markTestIncomplete(
        //   'This test has not been implemented yet.'
        // );
    }
}
