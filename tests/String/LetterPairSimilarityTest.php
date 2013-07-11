<?php

use String\LetterPairSimilarity;

class LetterPairSimilarityTest extends PHPUnit_Framework_TestCase
{
    public function testCompareEmptyStrings()
    {
        $result = LetterPairSimilarity::compare('', '');
        $this->assertEquals(1, $result);
    }

    public function testCompareIdenticalStrings()
    {
        $result = LetterPairSimilarity::compare('hello', 'hello');
        $this->assertEquals(1, $result);
    }

    public function testCompareSingleWord()
    {
        $result = LetterPairSimilarity::compare('Healthy', 'Healed');
        $this->assertEquals(0.55, round($result, 2));
    }

    public function testCompareSeveralWords()
    {
        $result = LetterPairSimilarity::compare('Web Database Applications', 'Web Database Applications with PHP & MySQL');
        $this->assertEquals(0.82, round($result, 2));
    }
}
