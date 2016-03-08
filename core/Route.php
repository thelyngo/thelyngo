<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class Route
{
    static $routes = array();

    public static function add($route, $controller, $action = 'index', $methods = array('GET', 'POST'))
    {
        self::$routes[$route] = array(
            'controller' => $controller,
            'action' => $action,
            'methods' => $methods
            );
    }

    public static function run()
    {
        $request = new Request();
        $routes = self::replaceRegex(self::$routes);

        $controller_name = '';
        $matches = array();

        foreach ($routes as $pattern => $controller)
            if (preg_match('#^/?'.$pattern.'/?$#', $request->uri, $match))
            {
                $controller_name = $controller;
                $matches['params'] = array_slice($match, 1);
                $matches['current_page'] = strtolower($controller['controller']);

                break;
            }

        if (is_array($controller_name))
        {
            $methods = array('GET');
            $action = '';

            if (isset($controller_name['controller']))
            {
                if (isset($controller_name['methods']))
                    $methods = $controller_name['methods'];
                if (isset($controller_name['action']))
                    $action = $controller_name['action'];

                $controller_name = $controller_name['controller'];
            }
            else
            {
                d("ELSEEEEE");
                if (isset($controller_name[1]) && is_array($controller_name[1]))
                    $methods = $controller_name[1];
                $controller_name = $controller_name[0];
            }

            if (in_array(strtoupper($request->verb), $methods))
            {
                $class = $controller_name.'Controller';

                // Check if controller class exists
                if (Controller::exists($class))
                {
                    $controller = new $class($matches);
                    $action .= 'Action';
                    $method = strtolower($request->verb);

                    // Check if ajax action on current controller exists
                    if ($request->is_ajax && Controller::has($controller, $action.'_ajax'))
                    {
                        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
                        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
                        header('Cache-Control: no-store, no-cache, must-revalidate');
                        header('Cache-Control: post-check=0, pre-check=0', false);
                        header('Pragma: no-cache');

                        $matches['params'] = $_POST;

                        Controller::load(array($controller, $action . '_ajax'), $matches);
                    }
                    // Check if the requested action exists
                    elseif (Controller::has($controller, $action))
                        Controller::load($controller, $action, $matches);
                    else
                        raise('404');
                }
                elseif (function_exists($controller_name))
                {
                    d("ah bon ?");
                    call_user_func_array($controller_name, $matches);
                }
                else
                    raise('404');
            }
            else
                raise('405');
        }
        else
            if ($request->is_ajax)
                die("KO");
            else
                raise('404');
    }

    static function replaceRegex($routes)
    {
        $return = array();

        foreach ($routes as $key => $val)
        {
            $key = str_replace(':any', '.+', $key);
            $key = str_replace(':num', '[0-9]+', $key);
            $key = str_replace(':nonum', '[^0-9]+', $key);
            $key = str_replace(':alpha', '[A-Za-z]+', $key);
            $key = str_replace(':alnum', '[A-Za-z0-9]+', $key);
            $key = str_replace(':url', '[A-Za-z0-9-]+', $key);
            $key = str_replace(':hex', '[A-Fa-f0-9]+', $key);
            $key = str_replace(':1any', '.', $key);
            $key = str_replace(':1num', '[0-9]', $key);
            $key = str_replace(':1nonum', '[^0-9]', $key);
            $key = str_replace(':1alpha', '[A-Za-z]', $key);
            $key = str_replace(':1alnum', '[A-Za-z0-9]', $key);

            $return[$key] = $val;
        }

        return $return;
    }
}

function raise_404()
{
    header("HTTP/1.1 404 Not Found");
    die('<h1>Sorry! What you are looking for does not exists. :(</h1>');
}

function raise_405()
{
    header("HTTP/1.1 405 Method Not Allowed");
    die('<h1>405: Method Not Allowed</h1>');
}
