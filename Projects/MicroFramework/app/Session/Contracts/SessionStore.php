<?php
namespace App\Session\Contracts;


/**
 * Interface SessionStore
 * @package App\Session\Contracts
*/
interface SessionStore
{
    /**
     * Get Session
     *
     * @param $key
     * @param null $default
     * @return mixed
    */
    public function get($key, $default = null);


    /**
     * @param $key
     * @param null $value
     * @return mixed
    */
    public function set($key, $value = null);


    /**
     * @param $key
     * @return bool
    */
    public function exists($key);


    /**
     * @param mixed ...$key
     * @return mixed
    */
    public function clear(...$key);
}