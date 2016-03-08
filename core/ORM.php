<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class ORM
{
    static $manager            = null;

    public static function init()
    {
        $paths = array(_MODELS_DIR_, _CORE_MODELS_DIR_);

        $dbParams = array(
            'driver'    => _DB_DRIVER_,
            'host'      => _DB_SERVER_,
            'port'      => _DB_PORT_,
            'user'      => _DB_USER_,
            'password'  => _DB_PASSWORD_,
            'dbname'    => _DB_NAME_,
            'charset'   => _DB_ENCODE_,
        );

        //$config = Setup::createAnnotationMetadataConfiguration($paths, _DEV_MODE_);
        $config = Setup::createAnnotationMetadataConfiguration($paths, true); // temporaire, le temps de comprendre pourquoi les models foutent le camp
        self::$manager = self::$manager = EntityManager::create($dbParams, $config);
    }

    public static function getRepository($repository)
    {
        if (self::$manager == null)
            self::init();

        return self::$manager->getRepository($repository);
    }

    public static function get($repository)
    {
        return self::getRepository($repository);
    }

    public static function persist($repository)
    {
        self::$manager->persist($repository);
    }

    public static function flush()
    {
        self::$manager->flush();
    }

    public static function remove($repository)
    {
        self::$manager->remove($repository);
    }
}
