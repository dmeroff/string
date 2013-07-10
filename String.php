<?php namespace Dektrium\Component\String;

/**
 * This class allows manipulating strings as objects.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class String
{
    /**
     * @var string String to manipulate.
     */
    protected $string;

    /**
     * @var bool Whether "mbstring" php extension is loaded.
     */
    protected $mbstring;

    /**
     * @var string Encoding of the string.
     */
    protected $encoding;

    /**
     * Constructor.
     *
     * @param string $string
     * @param string $encoding
     */
    public function __construct($string = '', $encoding = 'UTF-8')
    {
        $this->string   = $string;
        $this->mbstring = extension_loaded('mbstring');
        $this->encoding = $encoding;
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
     * Returns the length of a string.
     * 
     * @return int
     */
    public function length()
    {
        return $this->mbstring ? mb_strlen($this->string, $this->encoding) : strlen($this->string);
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