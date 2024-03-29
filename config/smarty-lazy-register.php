<?php
/**
 * Used to delay loading of external classes with smarty->register_plugin
 */
class SmartyLazyRegister
{
    protected $registry = array();
    protected static $instance;
    /**
     * Register a function or method to be dynamically called later
     * @param string|array $params function name or array(object name, method name)
     */
    public function register($params)
    {
        if (is_array($params))
            $this->registry[$params[1]] = $params;
        else
            $this->registry[$params] = $params;
    }

    /**
     * Dynamically call static function or method
     *
     * @param string $name function name
     * @param mixed $arguments function argument
     * @return mixed function return
     */
    public function __call($name, $arguments)
    {
        $item = $this->registry[$name];

        // case 1: call to static method - case 2 : call to static function
        if (is_array($item[1]))
            return call_user_func_array($item[1].'::'.$item[0], array($arguments[0], &$arguments[1]));
        else
        {
            $args = array();
            foreach ($arguments as $a => $argument)
            {
                if ($a == 0)
                    $args[] = $arguments[0];
                else
                    $args[] = &$arguments[$a];
            }

            return call_user_func_array($item, $args);
        }
    }

    public static function getInstance()
    {
        if (!self::$instance)
            self::$instance = new SmartyLazyRegister();

        return self::$instance;
    }
}
