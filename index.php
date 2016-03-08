<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2015 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

ob_start();
include_once dirname( __FILE__ )."/config/config.php";

// faudrait optimiser cette feature, et lui trouver une place...
//require_once _CONFIG_DIR_.'/hooks.php';

// The Ultimate Answer of Life, the Universe and Everything starts here
if (defined('_APP_MAINTENANCE_') && _APP_MAINTENANCE_ == false)
{
    Route::run();
}
else
{
    d('Maintenance');
}
