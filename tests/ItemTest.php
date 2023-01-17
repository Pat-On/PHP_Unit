<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item;

        $this->assertNotEmpty($item->getDescription());
    }

    public function testIDisAnInteger()
    {
        // $item = new Item;
        $item = new ItemChild;

        $this->assertIsInt($item->getID());
    }

    public function testTokenIsAString()
    {
        $item = new ItemChild;

        // https://www.php.net/manual/en/intro.reflection.php <--- reflection

        $reflector = new ReflectionClass(Item::class);

        // setting to what method we want to have access
        $method = $reflector->getMethod('getToken');

        // set it public
        $method->setAccessible(true);

        // executing private method and getting its result
        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    // it is possible but it is not always good idea
    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new ItemChild;

        // https://www.php.net/manual/en/intro.reflection.php <--- reflection

        $reflector = new ReflectionClass(Item::class);

        // setting to what method we want to have access
        $method = $reflector->getMethod('getPrefixedToken');

        // set it public
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
