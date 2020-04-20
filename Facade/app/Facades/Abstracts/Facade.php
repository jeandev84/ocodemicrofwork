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


    /** @var  */
    protected static $resolved;


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

          if($resolved = static::$resolved[$accessor] ?? null)
          {
              return $resolved;
          }

          dump('get instance once!');

         // str, filesystem
         return static::$resolved[$accessor] = static::$container->get($accessor);
    }


    /**
     * @param $method
     * @param $arguments
    */
    public static function __callStatic($method, $arguments)
    {
         $instance = static::getFacadeInstance();

         if(! method_exists($instance, $method))
         {
             return false;
         }

         return $instance->{$method}(...$arguments);
    }

    /** Get name of facade to be resolve in container */
    abstract protected function getFacadeAccessor();
}