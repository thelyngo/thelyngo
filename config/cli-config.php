<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

require_once dirname(__FILE__).'/config.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(_MODELS_DIR_, _CORE_MODELS_DIR_);
$isDevMode = _DEV_MODE_;

// the connection configuration
$dbParams = array(
    'driver'    => _DB_DRIVER_,
    'host'      => _DB_SERVER_,
    'port'      => _DB_PORT_,
    'user'      => _DB_USER_,
    'password'  => _DB_PASSWORD_,
    'dbname'    => _DB_NAME_,
    'charset'   => _DB_ENCODE_,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
