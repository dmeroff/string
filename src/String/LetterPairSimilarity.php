<?php namespace String;

/**
 * Class implements string comparison algorithm based on character pair similarity.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class LetterPairSimilarity
{
    /**
     * Compares the two strings based on letter pair matches
     *
     * @param  $string1
     * @param  $string2
     *
     * @return float
     */
    public static function compare($string1, $string2)
    {
        if (mb_strlen($string1, 'UTF-8') + mb_strlen($string2, 'UTF-8') == 0 || 0 == strcmp($string1, $string2)) {
            return 1.0;
        }

        $pairs1 = static::wordLetterPairs($string1);
        $pairs2 = static::wordLetterPairs($string2);

        $intersection = 0;
        $union = count($pairs1) + count($pairs2);

        foreach ($pairs1 as $pair1) {
            foreach ($pairs2 as $key => $pair2) {
                if ($pair1 == $pair2) {
                    $intersection++;
                    unset($pairs2[$key]);
                    break;
                }
            }
        }

        return (2.0*$intersection)/$union;
    }

    /**
     * Splits the input string into separate words, or tokens, then iterates through each of the words,
     * computing the character pairs for each word.
     *
     * @param  $string
     *
     * @return array
     */
    protected static function wordLetterPairs($string)
    {
        $allPairs = array();
        $words = explode(' ', $string);

        foreach ($words as $word) {
            $pairsInWord = static::letterPairs($word);
            foreach ($pairsInWord as $pair) {
                $allPairs[] = $pair;
            }
        }

        return $allPairs;
    }

    /**
     * Returns an array of adjacent letter pairs contained in the input string.
     *
     * @param  $string
     *
     * @return array
     */
    protected static function letterPairs($string)
    {
        $numPairs = mb_strlen($string, 'UTF-8') - 1;
        $pairs = array();
        for ($i = 0; $i < $numPairs; $i++) {
            $pairs[] = mb_substr($string, $i, 2, 'UTF-8');
        }

        return $pairs;
    }
}