<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class Log
{
    public static function report($code, $message, $file, $line)
    {
          ob_end_clean();

          $message = '<b>'.$message.'</b> in file <b>'.$file.'</b> at line <b>'.$line.'</b>';

          self::showError($message, $code);

          die();
    }

    public static function showError($message, $code)
    {
        if (_DEV_MODE_)
        {
            $smarty = new Smarty();
            $smarty->template_dir = _SMARTY_TEMPLATE_DIR_;
            $smarty->compile_dir = _SMARTY_CACHE_DIR_;

            $smarty->assign("base", _BASE_);
            $smarty->assign("code", self::code($code));
            $smarty->assign("message", $message);

            $smarty->display(_CORE_VIEWS_DIR_."errors.tpl");
        }
    }

    static function code($type)
    {
        switch($type)
        {
            case E_ERROR:
                return 'danger';
            case E_WARNING:
                return 'warning';
            case E_PARSE:
                return 'warning';
            case E_NOTICE:
                return 'warning';
            }
        return "danger";
    }
}
