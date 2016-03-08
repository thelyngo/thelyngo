<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class Controller
{
    protected static $params;

    public static function exists($controller)
    {
        return class_exists($controller);
    }

    public static function has($controller, $action)
    {
        return method_exists($controller, $action);
    }

    public static function load($controller, $action, $params = array())
    {
        self::$params = $params;

        if (array_key_exists('current_page', $params))
            View::assign("current", $params['current_page']);

        return call_user_func_array(array($controller, $action), $params);
    }
}
