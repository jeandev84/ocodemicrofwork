<?php
namespace DP;

/**
 * Anti-patterns
 * Singleton used for getting same instance object
 */
require_once __DIR__ . '/../vendor/autoload.php';



/**
 * Class Singleton
 * @package DP
 */
class Singleton
{

    /** @var Singleton */
    private static $instance;


    /**
     * @return Singleton
     */
    public static function instance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new static();
        }

        return self::$instance;
    }
}

/**
 * Class Config
 * @package DP
 */
class Config extends Singleton
{
    /** @var array  */
    public $data = [
        'db' => [
            'host' => '127.0.0.1'
        ]
    ];
}

$config = \DP\Config::instance();
$anohterConfig = \DP\Config::instance();

// dump($config->data);

dump($config === $anohterConfig); // true


$moreConfig = new \DP\Config();

dump($config === $moreConfig); // false