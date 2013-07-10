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

    public function testPrepend()
    {
        $string = new String('world');
        $this->assertAttributeEquals('world', 'string', $string);

        $string->prepend('Hello, ');
        $this->assertAttributeEquals('Hello, world', 'string', $string);
    }

    public function testAppend()
    {
        $string = new String('Hello');
        $this->assertAttributeEquals('Hello', 'string', $string);

        $string->append(', world');
        $this->assertAttributeEquals('Hello, world', 'string', $string);
    }

    public function testLength()
    {
        $s = new String('Hello, world');
        $this->assertEquals(12, $s->length());
    }
}
