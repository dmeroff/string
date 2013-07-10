<?php
namespace Dektrium\Component\String\Tests;


use Dektrium\Component\String\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        // using constructor
        $s = new String('Hello, world!');
        $this->assertAttributeEquals('Hello, world!', 'string', $s);

        // using static function 'make'
        $s = String::make('Hello, world!');
        $this->assertAttributeEquals('Hello, world!', 'string', $s);
    }

    public function test__ToString()
    {
        $s = new String('Hello, world!');
        $this->assertEquals('Hello, world!', sprintf("%s", $s));
    }

    public function testLength()
    {
        $s = new String('Hello, world');
        $this->assertEquals(12, $s->length());
    }
}
