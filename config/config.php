<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

/**
    Constants & debug mode
*/
require_once dirname(__FILE__).'/defines.php';
require_once dirname(__FILE__).'/smarty-lazy-register.php';

if (_DEV_MODE_)
{
    @ini_set('display_errors', 'on');
    error_reporting(E_ALL | E_STRICT);
}
else
    @ini_set('display_errors', 'off');

/**
    Include autoloads & routes
*/
if (file_exists(dirname(__FILE__).'/../vendor/autoload.php'))
    require_once dirname(__FILE__).'/../vendor/autoload.php';

require_once dirname(__FILE__).'/autoload.php';
spl_autoload_register('autoload_biskot_framework');

require_once _CONFIG_DIR_.'/routes.php';

/**
    Debug functions
*/

function d($object, $die = true)
{
    echo '<xmp style="text-align: left;background-color: white;">';
    print_r($object);
    echo '</xmp><br/>';

    if ($die)
        die("------END------");
}

function ds($object, $die = true)
{
    echo '<xmp style="text-align: left;background-color: white;">';
    \Doctrine\Common\Util\Debug::dump($object);
    echo '</xmp><b />';

    if ($die)
        die("------END------");
}

function p($object)
{
    d($object, false);
}


function raise($code)
{
    $args = func_get_args();
    $args = array_slice($args, 1);
    call_user_func_if_exists('raise_' . $code, $args);
}

function call_user_func_if_exists($func, $args = array())
{
    $retval = null;

    if (is_array($func))
    {
        if (method_exists($func[0], $func[1]))
        {
            $retval = call_user_func_array(array($func[0], $func[1]), $args);
        }
    }
    else
    {
        if (function_exists($func))
        {
            $retval = call_user_func_array($func, $args);
        }
    }
    return $retval;
}

register_shutdown_function('BiskotShutdownHandler');

function biskotShutdownHandler()
{
    $e = error_get_last();

    if ($e['type'] === E_ERROR)
        Log::report($e['type'], $e['message'], $e['file'], $e['line']);
}

/**
    Init functions
*/
ORM::init();
Auth::init();
View::init();
Lang::loadLang();
