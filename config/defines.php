<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

/**
    app informations
*/
require_once dirname(__FILE__).'/../app/config/settings.php';

/**
    app configuration
*/
define('_APP_SALT_',                '185156f135ds1fvs1dgfzefdsf21e');

/**
    path informations
*/
// root path
define('_ROOT_DIR_',                realpath(dirname(__FILE__).'/..'));

// system paths
define('_CORE_DIR_',                _ROOT_DIR_.'/core/');
define('_CACHE_DIR_',               _ROOT_DIR_.'/cache/');
define('_UPLOAD_DIR_BASE_',         _BASE_.'/upload/');
define('_UPLOAD_DIR_',              _ROOT_DIR_.'/upload/');
define('_APP_DIR_',                 _ROOT_DIR_.'/app/');
define('_VENDOR_DIR_',              _ROOT_DIR_.'/vendor/');

// core paths
define('_CORE_CONTROLLERS_DIR_',    _CORE_DIR_.'controllers/');
define('_CORE_MODELS_DIR_',         _CORE_DIR_.'models/');
define('_CORE_VIEWS_DIR_',          _CORE_DIR_.'views/');

// app paths
define('_CONTROLLERS_DIR_',         _APP_DIR_.'controllers/');
define('_MODELS_DIR_',              _APP_DIR_.'models/');
define('_VIEWS_DIR_',               _APP_DIR_.'views/');
define('_CLASSES_DIR_',             _APP_DIR_.'classes/');
define('_TRANSLATIONS_DIR_',        _APP_DIR_.'translations/');
define('_CONFIG_DIR_',              _APP_DIR_.'config/');
define('_THEME_DIR_',               _BASE_.'/app/views/'._CUR_THEME_);

// resources theme paths
define('_BASE_THEME_DIR_',          _THEME_DIR_.'/');
define('_CSS_DIR_',                 _THEME_DIR_.'/css/');
define('_JS_DIR_',                  _THEME_DIR_.'/js/');
define('_FONTS_DIR_',               _THEME_DIR_.'/fonts/');
define('_IMG_DIR_',                 _THEME_DIR_.'/images/');
define('_TPL_DIR_',                 _THEME_DIR_.'/tpl/');

/**
    smarty path informations
*/
define('_SMARTY_TEMPLATE_DIR_',     _VIEWS_DIR_._CUR_THEME_.'/tpl/');
define('_SMARTY_CACHE_DIR_',        _CACHE_DIR_);

/**
    user db informations
*/
// doctrine user entity configuration
define('_USER_ENTITY_',             'User');
define('_USER_ROLE_ENTITY_',        'UserRole');
define('_USER_CONNECTION_ENTITY_',  'UserConnection');
define('_USER_CRYPT_',              'sha512');

// doctrine user entity fields
define('_USER_ID_',                 'id');
define('_USER_USERNAME_',           'username');
define('_USER_EMAIL_',              'email');
define('_USER_PASSWORD_',           'password');
define('_USER_SALT_',               'salt');
define('_USER_TOKEN_',              'token');

// doctrine user role entity id
define('_USER_ROLE_MEMBER_',        '1');
define('_USER_ROLE_MODERATOR_',     '2');
define('_USER_ROLE_ADMIN_',         '3');
