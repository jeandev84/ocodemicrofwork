<?php
namespace DP;


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


    protected function __construct()
    {
    }


    protected function __clone()
    {

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

$config = Config::instance();
$anohterConfig = Config::instance();

//dump($config === $anohterConfig);



/**
 * Class User
 * @package DP
 */
class User
{
    protected $config;

    /**
     * User constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function register()
    {
        // Config::instance()->data;
    }
}


$user = new User($config);


