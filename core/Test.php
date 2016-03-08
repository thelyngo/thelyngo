<?php

class Test
{
    public static $toto = 'toto';

    public function __construct()
    {
        echo "BAH ON CONSTRUCT LOL";
    }

    public static function set($value)
    {
        self::$toto = $value;
    }

    public static function get()
    {
        return self::$toto;
    }
}
