<?php
namespace App\Facades\Abstracts;


/**
 * Class Facade
 * @package App\Facades\Abstracts
 */
abstract class Facade
{

    /** @var  */
    protected static $container;


    /**
     * Set container
     * @param $container
     */
    public static function setContainer($container)
    {
        static::$container = $container;
    }


    /**
     * Get instance of Facade
     *
     * dump($accessor, static::$container)
     */
    public static function getFacadeInstance()
    {
        $accessor = static::getFacadeAccessor();

        /* return static::$container[$accessor]; */
        return static::$container->get($accessor); // str, filesystem
    }


    /**
     * @param $method
     * @param $arguments
     */
    public static function __callStatic($method, $arguments)
    {
        /* dump($method); */

        $instance = static::getFacadeInstance();

        /* dump($instance); */

        return $instance->{$method}(...$arguments);
    }

    /** Get name of facade to be resolve in container */
    abstract protected function getFacadeAccessor();
}