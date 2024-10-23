<?php
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testExample() {
        $this->assertEquals(5, 2 + 3);       // assertEquals
        $this->assertTrue(true);             // assertTrue
        $this->assertInstanceOf(SomeClass::class, new SomeClass()); // assertInstanceOf
    }

}
