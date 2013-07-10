<?php
namespace Dektrium\Component\String\Tests;

use Dektrium\Component\String\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        // using constructor
        $string = new String('Hello, world!');
        $this->assertAttributeEquals('Hello, world!', 'string', $string);

        // using static function 'make'
        $string = String::make('Hello, world!');
        $this->assertAttributeEquals('Hello, world!', 'string', $string);
    }

    public function test__ToString()
    {
        $string = new String('Hello, world!');
        $this->assertEquals('Hello, world!', sprintf("%s", $string));
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

    public function testReplace()
    {
        $string = new String('Hello, world');
        $string->replace('Hello', 'Goodbye');

        $this->assertAttributeEquals('Goodbye, world', 'string', $string);
    }

    public function testUppercase()
    {
        $string = new String('Hello, world');
        $string->uppercase();

        $this->assertAttributeEquals('HELLO, WORLD', 'string', $string);
    }

    public function testCapitalize()
    {
        $string = new String('hello');
        $string->capitalize();

        $this->assertAttributeEquals('Hello', 'string', $string);
    }

    public function testLowercase()
    {
        $string = new String('HELLO, WORLD');
        $string->lowercase();

        $this->assertAttributeEquals('hello, world', 'string', $string);
    }

    public function testLength()
    {
        $string = new String('Hello, world');
        $this->assertEquals(12, $string->length());
    }
}
