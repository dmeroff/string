String [![Build Status](https://travis-ci.org/dmeroff/string.png?branch=master)](https://travis-ci.org/dmeroff/string)
======

String class
---------------------
String is a class that turns string into PHP objects. It implements a fluent interface, improving how we manipulate
strings, and extends functionality by providing common functions.

Imagine that you need to replace "hello" to "goodbye" and make first letter uppercase. In classic PHP it would like something like this:

```php
$string = 'hello, world';
$string = str_replace('hello', 'goodbye', $string);
$string = ucfirst($string);
echo $string; // Goodbye, world
```

Using the String class it gets simpler:

```php
$string = 'hello, world';
$string = new String\String($string);
echo $string->replace('hello', 'goodbye')->sentencecase(); // Goodbye, world
```

OR

```php
$string = 'hello, world';
echo String\String::make($string)->replace('hello', 'goodbye')->sentencecase(); // Goodbye, world
```

LetterPairSimilarity class
--------------------------

This class can be used to compare string using ["Strike a match"](http://www.catalysoft.com/articles/strikeamatch.html) algorithm.

```php
$similarity = String\LetterPairSimilarity('Healed', 'Healthy');
echo round($similarity, 2); // 0.55
```

Requirements
------------

- PHP 5.3 and higher
- mbstring extension