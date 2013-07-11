<?php namespace String;

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
     * @var string Encoding of the string.
     */
    protected $encoding;

    /**
     * Constructor.
     *
     * @param string $string
     * @param string $encoding
     *
     * @throws \RuntimeException
     */
    public function __construct($string = '', $encoding = 'UTF-8')
    {
        if (!extension_loaded('mbstring')) {
            throw new \RuntimeException('This class requires "mbstring" php extension be installed.');
        }
        $this->string   = $string;
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
        $this->string = mb_strtolower($this->string, $this->encoding);

        return $this;
    }

    /**
     * Makes a string's first character uppercase.
     *
     * @return $this
     */
    public function uppercase()
    {
        $this->string = mb_strtoupper($this->string, $this->encoding);

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
     * Converts the string to title case.
     *
     * @return $this
     */
    public function titlecase()
    {
        $this->string = ucwords($this->string);

        return $this;
    }

    /**
     * Converts the string to CamelCase (e.g: "hello world" => "helloWorld").
     * It will remove non alphanumeric character from the string.
     *
     * @return $this
     */
    public function camelcase()
    {
        $this->string = str_replace(' ', '', ucwords(preg_replace('/[^A-Z^a-z^0-9]+/', ' ', $this->string)));
        $this->string = lcfirst($this->string);

        return $this;
    }

    /**
     * Converts the spaces in string to underscores and lowercases the string (e.g: "hello world" => "hello_world").
     * It will remove non alphanumeric character from the string.
     *
     * @return $this
     */
    public function underscore()
    {
        $this->lowercase();
        $this->string = str_replace(' ', '_', preg_replace('/[^A-Z^a-z^0-9]+/', ' ', $this->string));

        return $this;
    }

    /**
     * Reverses a string.
     *
     * @return $this
     */
    public function reverse()
    {
        $this->string = implode(array_reverse(str_split($this->string)));

        return $this;
    }

    /**
     * Returns the length of a string.
     *
     * @return int
     */
    public function length()
    {
        return mb_strlen($this->string, $this->encoding);
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