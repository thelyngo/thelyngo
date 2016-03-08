<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

Class Auth
{
    private static $isHttps = false;
    private static $user = null;

    public static function init()
    {
        self::initSession();
        self::isConnected();
    }

    private static function initSession()
    {
        // force sessions to only use cookies
        if (ini_set('session.use_only_cookies', 1) === FALSE)
            d("Could not initiate a safe session");

        // this param will stops JS being able to access the session id
        $session_http = true;

        // get and set current cookies params
        $cookie = session_get_cookie_params();
        session_set_cookie_params(
            $cookie["lifetime"],
            $cookie["path"],
            $cookie["domain"],
            self::$isHttps,
            $session_http);

        // set a new session
        session_name(_APP_NAME_);
        session_start();
        session_regenerate_id();
    }

    private static function isConnected()
    {
        // if a session exists
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_hash']))
        {
            $user = ORM::get(_USER_ENTITY_)->find((int)$_SESSION['user_id']);

            $user_id = (int)$_SESSION['user_id'];
            $user_hash = $_SESSION['user_hash'];

            $user_check = hash(_USER_CRYPT_, $user->getPassword()._APP_SALT_);

            if ($user_hash == $user_check && $user->getIsActivated() != 0)
                self::$user = $user;
            else
                self::logout();
        }
    }

    public static function user()
    {
        return self::$user;
    }

    // le mot de passe stocké en base devra être password.random_salt_pre_generated.app_salt
    public static function login($login, $password, $bruteforceEnabled = false)
    {
        $ur = ORM::get(_USER_ENTITY_);

        $user = $ur->findOneBy(array(_USER_EMAIL_ => $login));

        if (!Validate::isLoadedObject($user)) // user email not exists
            return false;

        // check bruteforcing
        if ($bruteforceEnabled)
            if (self::checkforce($user))
                return false;

        // user exists, new userconnection
        $uc = new UserConnection();
        $uc->setUser($user);
        $uc->setBrowser($_SERVER['HTTP_USER_AGENT']);
        $uc->setCreatedAt(date_create());

        // hash user password
        $user_password = hash(_USER_CRYPT_, $password.$user->getSalt()._APP_SALT_);

        $isConnected = false;

        if ($user_password == $user->getPassword() && $user->getIsActivated() == 1) // passwords match, user enabled
        {
            // avoid XSS
            $user_id = preg_replace("/[^0-9]+/", "", $user->getId());
            $user_login = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $user->getUsername());

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_hash'] = hash(_USER_CRYPT_, $user_password._APP_SALT_);

            //$this->isConnected();

            $uc->setToken(Tools::passwdGen(15));
            $uc->setResult(1);

            $isConnected = true;
        }
        else // password not correct or user disabled
        {
            $uc->setResult(0);
        }

        ORM::persist($uc);
        ORM::flush();

        return $isConnected;
    }

    private static function checkforce($user)
    {
        return ORM::get(_USER_CONNECTION_ENTITY_)->findOneByBruteforcing($user);
    }

    public static function logout()
    {
        // unset session values
        $_SESSION = array();

        // get and set current cookies params
        $cookie = session_get_cookie_params();

        // delete the actual cookie
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $cookie["path"],
            $cookie["domain"],
            $cookie["secure"],
            $cookie["httponly"]);

        // destroy session and reload current page
        session_destroy();
    }

    public static function register($username, $email, $password, $id_role = _USER_ROLE_MEMBER_, $enabled = 0)
    {
        if (($username || $email) && $password)
        {
            // valid username
            if (!$username || Validate::isUsername($username))
                $user = ORM::get(_USER_ENTITY_)->findOneBy(array(_USER_USERNAME_ => $username));
            else
                return false;

            if (!Validate::isLoadedObject($user)) // user login not exists
            {
                // valid email
                if (!$email || Validate::isEmail($email))
                    $user = ORM::get(_USER_ENTITY_)->findOneBy(array(_USER_EMAIL_ => $email));
                else
                    return false;

                if (!Validate::isLoadedObject($user)) // user email not exists
                {
                    $user = new User();

                    if ($username)
                    {
                        $user->setUsername($username);
                        $user->setUsernameSlug(Tools::str2url($username));
                        if ($email)
                            $user->setEmail($email);
                    }
                    else
                        if ($email)
                        {
                            $user->setEmail($email);
                            $user->setUsername($email);
                            $user->setUsernameSlug(Tools::str2url($email));
                        }

                    $user->setSalt(Tools::passwdGen(15));
                    $user->setPassword(hash(_USER_CRYPT_, $password.$user->getSalt()._APP_SALT_));
                    $user->setIsActivated($enabled);
                    $user->setRole(ORM::get(_USER_ROLE_ENTITY_)->find((int)$id_role));
                    $user->setCreatedAt(date_create());

                    ORM::persist($user);
                    ORM::flush();

                    return true;
                }
            }
            return false; // un membre existe deja avec le login
        }
        else
            return false; // infos manquantes
    }

    /*public function validationRegistration($email, $token)
    {
        if ($email && $token)
        {
            $user = ORM::get(_USER_ENTITY_)->findOneBy(array(
                _USER_EMAIL_ => $email
                ));

            if ($this->validate->isLoadedObject($user))
            {
                $user->setIsActivated(1);

                ORM::persist($user);
                ORM::flush();

                return true;
            }
        }

        return false;
    }*/

    public static function getActionForm()
    {
        $url = $_SERVER['REQUEST_URI'];

        $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

        $strip = array('%0d', '%0a', '%0D', '%0A');
        $url = (string) $url;

        $count = 1;
        while ($count)
            $url = str_replace($strip, '', $url, $count);

        $url = str_replace(';//', '://', $url);

        $url = htmlentities($url);

        $url = str_replace('&amp;', '&#038;', $url);
        $url = str_replace("'", '&#039;', $url);

        if ($url[0] !== '/')
            // we're only interested in relative links from $_SERVER['REQUEST_URI']
            return '';
        else
            return $url;
    }

    public static function checkMemberRole($id_role)
    {
        if (!self::$user)
            return false;
        else
            if (self::$user->getRole()->getId() != $id_role)
                return false;

        return true;
    }
}
