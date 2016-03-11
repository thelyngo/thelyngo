<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class View
{
    static $smarty = null;
    static $css = array();
    static $js = array();
    static $alerts = array();

    public static function init()
    {
        // set smarty context
        self::$smarty = new Smarty();
        self::$smarty->template_dir = _SMARTY_TEMPLATE_DIR_;
        self::$smarty->compile_dir = _SMARTY_CACHE_DIR_;

        // set paths to views
        self::assign("base", _BASE_);
        self::assign("base_theme", _BASE_THEME_DIR_);
        self::assign("css", _CSS_DIR_);
        self::assign("js", _JS_DIR_);
        self::assign("fonts", _FONTS_DIR_);
        self::assign("images", _IMG_DIR_);
        self::assign("upload_base", _UPLOAD_DIR_BASE_);
        self::assign("upload", _UPLOAD_DIR_);
        self::assignFunc('function', 'trans', array('Lang', 'trans'));
    }

    public static function assign($name, $value)
    {
        self::$smarty->assign($name, $value);
    }

    public static function assignFunc($type, $function, $params, $lazy = true)
    {
        if (!in_array($type, array('function', 'modifier', 'block')))
            return false;
        // lazy is better if the function is not called on every page
        if ($lazy)
        {
            $lazy_register = SmartyLazyRegister::getInstance();
            $lazy_register->register($params);

            if (is_array($params))
                $params = $params[1];
            // SmartyLazyRegister allows to only load external class when they are needed
            self::$smarty->registerPlugin($type, $function, array($lazy_register, $params));
        }
        else
            self::$smarty->registerPlugin($type, $function, $params);
    }

    public static function assignArray($params)
    {
        foreach ($params as $name => $param)
            self::assign($name, $param);
    }

    public static function css($path)
    {
        if (is_array($path))
        {
            foreach ($path as $file)
                self::$css[] = _CSS_DIR_.$file;
        }
        else
            self::$css[] = _CSS_DIR_.$path;
    }

    public static function js($path)
    {
        if (is_array($path))
        {
            foreach ($path as $file)
                self::$js[] = _JS_DIR_.$file;
        }
        else
            self::$js[] = _JS_DIR_.$path;
    }

    public static function alert($content, $type = "danger")
    {
        self::$alerts[] = array('content' => $content, 'type' => $type);
    }

    public static function render($tpl, array $params = array())
    {
        self::assign("alerts", self::$alerts);
        self::assign("user", Auth::user());

        // assign params
        self::assignArray($params);

        // assign css and js files
        self::assignMedia();

        // display the template file
        self::$smarty->display($tpl.".tpl");
    }

    public static function fetch($tpl, array $params = array())
    {
        self::assign("alerts", self::$alerts);

        // assign params
        self::assignArray($params);

        // assign css and js files
        self::assignMedia();

        // display the template file
        return self::$smarty->fetch($tpl.".tpl");
    }

    /* private methods */
    static function assignMedia()
    {
        $js_included = '';
        $css_included = '';

        foreach (self::$js as $file)
            $js_included .= '<script type="text/javascript" src="'.$file.'"></script>';

        foreach (self::$css as $file)
            $css_included .= '<link rel="stylesheet" type="text/css" href="'.$file.'">';

        self::assign("js_files", $js_included);
        self::assign("css_files", $css_included);
    }
}
