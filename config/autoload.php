<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

function autoload_biskot_framework($class_name)
{
    // Class directories to include
    $directorys = array(
        _CORE_DIR_,
        _CORE_CONTROLLERS_DIR_,
        _CORE_MODELS_DIR_,
        _CONTROLLERS_DIR_,
        _MODELS_DIR_,
        _CLASSES_DIR_
        );

    foreach ($directorys as $directory)
    {
        // If the file exsists
	if (file_exists(($directory.ucfirst($class_name) . '.php')))
        {
            require_once($directory.ucfirst($class_name) . '.php');

            return;
        }
    }
}
