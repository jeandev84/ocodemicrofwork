<?php
namespace App\Cookie;


/**
 * Class CookieJar
 * @package App\Cookie
 */
class CookieJar
{

    /**
     * @var string
    */
    protected $path = '/';

    /**
     * @var string|null
    */
    protected $domain = null;


    /** @var bool  */
    protected $secure = false;


    /**
     * @var bool
   */
    protected $httpOnly = true;


    /**
     * @param $name
     * @param $value
     * @param int $minutes
     *
     * $this->set('abc', 'def');
    */
    public function set($name, $value, $minutes = 60)
    {
        $expiry = time() + ($minutes * 60);

        setcookie(
            $name,
            $value,
            $expiry,
            $this->path,
            $this->domain,
            $this->secure,
            $this->httpOnly
        );
    }

    /**
     * Get cookie from globals
     * @param $key
     * @param null $default
     * @return mixed
     *
     * $this->get('abc');
     */
    public function get($key, $default = null)
    {
        if($this->exists($key))
        {
            return $_COOKIE[$key];
        }

        return $default;
    }


    /**
     * Determine if has key in cookie
     * @param $key
     * @return bool
    */
    public function exists($key)
    {
        return isset($_COOKIE[$key]) && ! empty($_COOKIE[$key]);
    }


    /**
     * Remove cookie by identified key
     * @param $key
     *
     * $this->clear('abc');
     */
    public function clear($key)
    {
       $this->set(
           $key,
           null,
           -2628000,
           $this->path,
           $this->domain,
           $this->secure,
           $this->httpOnly
       );
    }


    /**
     * Set cookie forever
     * @param $key
     * @param $value
     *
     * $this->forever('name', 'Brown');
    */
    public function forever($key, $value)
    {
       $this->set($key, $value, 2628000);
    }
}