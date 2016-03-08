<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class Validate
{
    /**
    * Check for username validity
    *
    * @param string $username username string to validate
    * @return boolean Validity is ok or not
    */
    public static function isUsername($username)
    {
        return !empty($username) && preg_match('/^(^[a-zA-Z0-9\s?]{3,15}$).*$/ui', $username);
    }

    /**
    * Check for e-mail validity
    *
    * @param string $email e-mail address to validate
    * @return boolean Validity is ok or not
    */
    public static function isEmail($email)
    {
        return !empty($email) && preg_match('/^[a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z\p{L}0-9]+[._a-z\p{L}0-9-]*\.[a-z0-9]+$/ui', $email);
    }

    /**
     * Check for HTML field validity
     *
     * @param string $html HTML field to validate
     * @return boolean Validity is ok or not
     */
    public static function isCleanHtml($html, $allow_iframe = false)
    {
        $events = 'onmousedown|onmousemove|onmmouseup|onmouseover|onmouseout|onload|onunload|onfocus|onblur|onchange';
        $events .= '|onsubmit|ondblclick|onclick|onkeydown|onkeyup|onkeypress|onmouseenter|onmouseleave|onerror|onselect|onreset|onabort|ondragdrop|onresize|onactivate|onafterprint|onmoveend';
        $events .= '|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus|onbeforepaste|onbeforeprint|onbeforeunload|onbeforeupdate|onmove';
        $events .= '|onbounce|oncellchange|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavailable|ondatasetchanged|ondatasetcomplete|ondeactivate|ondrag|ondragend|ondragenter|onmousewheel';
        $events .= '|ondragleave|ondragover|ondragstart|ondrop|onerrorupdate|onfilterchange|onfinish|onfocusin|onfocusout|onhashchange|onhelp|oninput|onlosecapture|onmessage|onmouseup|onmovestart';
        $events .= '|onoffline|ononline|onpaste|onpropertychange|onreadystatechange|onresizeend|onresizestart|onrowenter|onrowexit|onrowsdelete|onrowsinserted|onscroll|onsearch|onselectionchange';
        $events .= '|onselectstart|onstart|onstop';

        if (is_array($html))
            foreach ($html as $key => $val)
            {
                if (is_array($val))
                    if (self::isCleanHtml($val, $allow_iframe))
                        return true;
                    else
                        return false;
                else
                {
                    if (isset($val) && !empty($val))
                        if (preg_match('/<[\s]*script/ims', $val) || preg_match('/('.$events.')[\s]*=/ims', $val) || preg_match('/.*script\:/ims', $val))
                            return false;

                        if (!$allow_iframe && preg_match('/<[\s]*(i?frame|form|input|embed|object)/ims', $val))
                            return false;
                }
            }
        else
        {
            if (preg_match('/<[\s]*script/ims', $html) || preg_match('/('.$events.')[\s]*=/ims', $html) || preg_match('/.*script\:/ims', $html))
                return false;

            if (!$allow_iframe && preg_match('/<[\s]*(i?frame|form|input|embed|object)/ims', $html))
                return false;
        }

        return true;
    }

    /**
     * Check if all entries are set in the array
     *
     * @param array $array Entries to test
     * @param array $params List of key to test
     * @return boolean Validity is ok or not
     */
    public static function isAllSet($array, $params)
    {
        if (is_array($params) && is_array($array))
        {
            foreach ($params as $key)
                if (array_key_exists($key, $array))
                {
                    if (!isset($array[$key]) && empty($array[$key]))
                        return false;
                }
                else
                    return false;

            return true;
        }
        else
            return false;
    }

    /**
     * Check object validity
     *
     * @param object $object Object to validate
     * @return boolean Validity is ok or not
     */
    public static function isLoadedObject($object)
    {
        return is_object($object);
    }
}
