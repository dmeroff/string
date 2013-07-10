<?php namespace Dektrium\Component\String;

/**
 * This class allows manipulating strings as objects.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class String
{
    /**
     * @var string
     */
    protected $string;

    /**
     * Constructor.
     *
     * @param string $string String to manipulate.
     */
    public function __construct($string = '')
    {
        $this->string = $string;
    }

    /**
     * Creates new string instance.
     *
     * @param  string $string String to manipulate.
     *
     * @return static
     */
    public static function make($string = '')
    {
        return new static($string);
    }
}