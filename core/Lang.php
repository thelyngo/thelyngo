<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class Lang
{
    public static $langs = array("fr" =>
                                    array("lc" => "fr_FR", "lc_all" => "fra", "lc_time" => "fra", "language" => "Français"),
                                 "en" =>
                                    array("lc" => "en_US", "lc_all" => "eng", "lc_time" => "eng", "language" => "English"));

    public static function loadLang($lang = "")
    {
        if (isset($lang) && Lang::exist($lang))
            $langKey = $lang;
        else
            $langKey = isset($_SESSION["locale"]) ? $_SESSION["locale"] : _APP_DEFAULT_LANG_;

        $infos = Lang::$langs[$langKey];

        setlocale(LC_ALL,   $infos["lc"], $infos["lc_all"]);
        setlocale(LC_TIME,  $infos["lc"], $infos["lc_time"]);

        $_SESSION["locale"] = $langKey;
    }

    public static function trans($key, $params = array())
    {
        $lang = isset($_SESSION["locale"]) ? $_SESSION["locale"] : _APP_DEFAULT_LANG_;

        if (file_exists(_TRANSLATIONS_DIR_.'strings_' . $lang . '.php'))
        {
            require(_TRANSLATIONS_DIR_.'strings_' . $lang . '.php');

            if (isset($trans[$lang][$key]))
            {
                $trans = $trans[$lang][$key];

                foreach ($params as $param => $value)
                    $trans = str_replace($param, $value, $trans);

                return $trans;
            }
        }

        return $key;
    }

    public static function exist($lang)
    {
        if (isset($lang) && array_key_exists($lang, Lang::$langs))
            return true;
        else
            return false;
    }

    public static function getLanguages()
    {
        $arr = array();

        foreach (Lang::$langs as $key => $tab)
            $arr[$key] = $tab["language"];

        return $arr;
    }
}
