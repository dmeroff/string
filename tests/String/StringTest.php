<?php

use \String\String;

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

    public function test__Invoke()
    {
        $string = new String('Hello, world!');
        $chars = $string(7);
        $this->assertEquals('world!', $chars);

        $chars = $string(1, 4);
        $this->assertEquals('ello', $chars);
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

    public function testTrim()
    {
        $string = new String(' hello ');
        $string->trim();

        $this->assertAttributeEquals('hello', 'string', $string);
    }

    public function testLtrim()
    {
        $string = new String(' hello');
        $string->ltrim();

        $this->assertAttributeEquals('hello', 'string', $string);
    }

    public function testRtrim()
    {
        $string = new String('hello ');
        $string->rtrim();

        $this->assertAttributeEquals('hello', 'string', $string);
    }

    public function testReplace()
    {
        $string = new String('Hello, world');
        $string->replace('Hello', 'Goodbye');

        $this->assertAttributeEquals('Goodbye, world', 'string', $string);
    }

    public function testLowercase()
    {
        $string = new String('HELLO, WORLD');
        $string->lowercase();

        $this->assertAttributeEquals('hello, world', 'string', $string);
    }

    public function testUppercase()
    {
        $string = new String('Hello, world');
        $string->uppercase();

        $this->assertAttributeEquals('HELLO, WORLD', 'string', $string);
    }

    public function testSentencecase()
    {
        $string = new String('heLLo');
        $string->sentencecase();

        $this->assertAttributeEquals('Hello', 'string', $string);
    }

    public function testTitlecase()
    {
        $string = new String('hello, world');
        $string->titlecase();

        $this->assertAttributeEquals('Hello, World', 'string', $string);
    }

    public function testCamelcase()
    {
        $string = new String('hello, world');
        $string->camelcase();

        $this->assertAttributeEquals('helloWorld', 'string', $string);
    }

    public function testUnderscore()
    {
        $string = new String('hello, world');
        $string->underscore();

        $this->assertAttributeEquals('hello_world', 'string', $string);
    }

    public function testReverse()
    {
        $string = new String('string');
        $string->reverse();

        $this->assertAttributeEquals('gnirts', 'string', $string);
    }

    public function testLength()
    {
        $string = new String('Hello, world');
        $this->assertEquals(12, $string->length());
    }
}
