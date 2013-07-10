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
     * @var bool Whether "mbstring" php extension is loaded.
     */
    protected $mbstring;

    /**
     * Constructor.
     *
     * @param string $string String to manipulate.
     */
    public function __construct($string = '')
    {
        $this->string   = $string;
        $this->mbstring = extension_loaded('mbstring');
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

    /**
     * Gets the string.
     *
     * @return string
     */
    public function get()
    {
        return $this->string;
    }

    /**
     * PHP magic method. Gets the string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->string;
    }
}