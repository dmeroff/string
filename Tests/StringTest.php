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
}
