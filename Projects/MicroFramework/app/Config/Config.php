<?php
namespace App\Config;


use App\Config\Loaders\Contracts\Loader;

/**
 * Class Config
 * @package App\Config
*/
class Config
{

    /** @var array  */
    protected $config = [];


    /** @var array  */
    protected $cache = [];


    /**
     * @param array $loaders
    */
    public function load(array $loaders)
    {
        foreach ($loaders as $loader)
        {
             if(! $loader instanceof Loader)
             {
                 continue;
             }

             $this->config = array_merge($this->config, $loader->parse());
        }

        return $this;
    }


    /**
     * Get item from config or cache
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
         if($this->existsInCache($key))
         {
             /* dump('got from Cache'); */
             return $this->fromCache($key);
         }

         /* dump('got from extractFromConfig'); */
         return $this->addToCache(
             $key,
             $this->extractFromConfig($key) ?? $default
         );
    }


    /**
     * @param $key
     * @return array|mixed|void
    */
    protected function extractFromConfig($key)
    {
        $filtered = $this->config;

        foreach (explode('.', $key) as $segment)
        {
            if($this->exists($filtered, $segment))
            {
                $filtered = $filtered[$segment];
                continue;
            }

            return;
        }

        return $filtered;
    }


    /**
     * Determine if the given item exist in the cache
     * @param $key
    */
    protected function existsInCache($key)
    {
        return isset($this->cache[$key]);
    }


    /**
     * Get item from the cache
     *
     * @param $key
     * @return mixed
     */
    protected function fromCache($key)
    {
         return $this->cache[$key];
    }

    /**
     * Add item to the cache
     * @param $key
     * @param $value
    */
    protected function addToCache($key, $value)
    {
         $this->cache[$key] = $value;

         return $value;
    }


    /**
     * Determine if the given key $key exist in $config
     *
     * @param array $config
     * @param $key
     * @return bool
    */
    protected function exists(array $config, $key)
    {
         return array_key_exists($key, $config);
    }


}