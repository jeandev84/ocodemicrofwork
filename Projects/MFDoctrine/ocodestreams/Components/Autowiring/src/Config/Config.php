<?php
namespace Framework\Config;


/**
 * Class Config
 * @package Framework\Config
*/
class Config
{
    protected $config = [
        'app' => [
            'name'=> 'codecourse'
        ],
        'db' => [
            'host' => '127.0.0.1',
            'database' => 'autowiring',
            'username' => 'root',
            'password' => 'password'
        ]
    ];

    /** @var array  */
    protected $cache = [];


    /**
     * Config constructor.
    */
    /*
    public function __construct()
    {
        dump('init');
    }
    */

    /**
     * @param $key
     * @param null $default
     * @return mixed
    */
    public function get($key, $default = null)
    {
        if ($this->existsInCache($key)){
            return $this->fromCache($key);
        }

        return $this->addToCache(
            $key, $this->extractFromConfig($key) ?? $default
        );
    }


    /**
     * @param $key
     * @return string[]|\string[][]|void
    */
    protected function extractFromConfig($key)
    {
        $filtered = $this->config;

        foreach (explode('.', $key) as $segment) {
            if ($this->exists($filtered, $segment)) {
                $filtered = $filtered[$segment];
                continue;
            }

            return;
        }

        return $filtered;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
    */
    protected function addToCache($key, $value)
    {
        $this->cache[$key] = $value;

        return $value;
    }


    /**
     * @param $key
     * @return mixed
    */
    protected function fromCache($key)
    {
        return $this->cache[$key];
    }


    /**
     * @param array $config
     * @param $key
     * @return bool
   */
    protected function exists(array $config, $key)
    {
        return array_key_exists($key, $config);
    }


    /**
     * @param $key
     * @return bool
    */
    protected function existsInCache($key)
    {
        return isset($this->cache[$key]);
    }
}