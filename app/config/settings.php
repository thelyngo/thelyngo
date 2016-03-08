<?php

/**
    app configuration
*/
define('_APP_MAINTENANCE_',         false);
define('_APP_ENV_',                 2); // 1: DEV, 2: PREPROD, 3: PROD
define('_APP_NAME_',                'TheLyngo');
define('_APP_DEFAULT_LANG_',        'fr'); //fr, en, es etc.

if (_APP_ENV_ == 1) // DEV
{
    // website configuration
    define('_DEV_MODE_',            true);
    define('_CUR_THEME_',           'ultima');
    define('_BASE_',                '/hamza/site');

    // db informations
    define('_DB_SERVER_',           '127.0.0.1');
    define('_DB_PORT_',             '8889');
    define('_DB_NAME_',             'db_hamza');
    define('_DB_USER_',             'root');
    define('_DB_PASSWORD_',         'root');
    define('_DB_ENCODE_',           'utf8');
    define('_DB_DRIVER_',           'pdo_mysql');

    // api informations
    define('_API_USER_',           'hnaimeapi');
    define('_API_PASSWORD_',       'password');
    define('_API_SALT_',           '15484f51sf5483');
}
else if (_APP_ENV_ == 2) // PREPROD
{
    // website configuration
    define('_DEV_MODE_',            true);
    define('_CUR_THEME_',           'ultima');
    define('_BASE_',                '');

    // db informations
    define('_DB_SERVER_',           'thelyngour1234.mysql.db');
    define('_DB_PORT_',             '');
    define('_DB_NAME_',             'thelyngour1234');
    define('_DB_USER_',             'thelyngour1234');
    define('_DB_PASSWORD_',         'TheLyngo1234');
    define('_DB_ENCODE_',           'utf8');
    define('_DB_DRIVER_',           'pdo_mysql');

    // api informations
    define('_API_USER_',           'hnaimeapi');
    define('_API_PASSWORD_',       'password');
    define('_API_SALT_',           '');
}
else if (_APP_ENV_ == 3) // PROD
{
    // website configuration
    define('_DEV_MODE_',            false);
    define('_CUR_THEME_',           'ultima');
    define('_BASE_',                '');

    // db informations
    define('_DB_SERVER_',           'thelyngour1234.mysql.db');
    define('_DB_PORT_',             '');
    define('_DB_NAME_',             'thelyngour1234');
    define('_DB_USER_',             'thelyngour1234');
    define('_DB_PASSWORD_',         'TheLyngo1234');
    define('_DB_ENCODE_',           'utf8');
    define('_DB_DRIVER_',           'pdo_mysql');

    // api informations
    define('_API_USER_',           'hnaimeapi');
    define('_API_PASSWORD_',       'password');
    define('_API_SALT_',           '');
}
else
{
    // catch exception env missing
}
