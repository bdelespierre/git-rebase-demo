<?php

namespace Tests\Unit;

use GitRebaseDemo\MyString;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \GitRebaseDemo\MyString
 */
class MyStringTest extends TestCase
{
    /**
     * @covers ::__toString
     */
    public function testToString()
    {
        $string = new MyString("hello world!");

        $this->assertEquals(
            "hello world!",
            (string) $string
        );
    }

    /**
     * @covers ::append
     */
    public function testAppend()
    {
        $string = new MyString("hello");
        $string->append(" world!");

        $this->assertEquals(
            "hello world!",
            (string) $string
        );
    }
}
