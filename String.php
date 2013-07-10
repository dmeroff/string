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
     * @param  string $string
     * @param  string $encoding
     *
     * @return static
     */
    public static function make($string = '', $encoding = 'UTF-8')
    {
        return new static($string, $encoding);
    }

    /**
     * Prepends a string to current string
     *
     * @param  string $string
     *
     * @return $this
     */
    public function prepend($string = '')
    {
        $this->string = $string . $this->string;

        return $this;
    }

    /**
     * Appends a string to current string
     *
     * @param  string $string
     *
     * @return $this
     */
    public function append($string = '')
    {
        $this->string .= $string;

        return $this;
    }

    /**
     * Replaces all occurrences of the search string with the replacement string.
     *
     * @param mixed $search  The value being searched for, otherwise known as the needle.
     * @param mixed $replace The replacement value that replaces found search
     *
     * @return $this
     */
    public function replace($search, $replace)
    {
        $this->string = str_replace($search, $replace, $this->string);

        return $this;
    }

    /**
     * Makes a string lowercase.
     *
     * @return $this
     */
    public function lowercase()
    {
        $this->string = $this->mbstring ? mb_strtolower($this->string, $this->encoding) : strtolower($this->string);

        return $this;
    }

    /**
     * Makes a string's first character uppercase.
     *
     * @return $this
     */
    public function uppercase()
    {
        $this->string = $this->mbstring ? mb_strtoupper($this->string, $this->encoding) : strtoupper($this->string);

        return $this;
    }

    /**
     * Makes first letter uppercase.
     *
     * @return $this
     */
    public function capitalize()
    {
        $this->string = ucfirst($this->string);

        return $this;
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