<?php

namespace Tests\Unit;

use GitRebaseDemo\MyString;
use PHPUnit\Framework\TestCase;

class MyStringTest extends TestCase
{
    /**
     * @covers MyString::__toString
     */
    public function testToString()
    {
        $string = new MyString("hello world!");

        $this->assertEquals(
            "hello world!",
            (string) $string
        );
    }
}
