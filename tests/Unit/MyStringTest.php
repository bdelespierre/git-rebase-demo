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
     * @dataProvider appendDataProvider
     * @covers ::append
     */
    public function testAppend(string $value, string $suffix, string $expected)
    {
        $string = new MyString($value);
        $string->append($suffix);

        $this->assertEquals(
            $expected,
            (string) $string
        );
    }

    public function appendDataProvider()
    {
        return include __DIR__ . '/Data/MyStringTest/TestAppend.php';
    }
}
