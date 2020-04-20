<?php
namespace Framework\Container;


use Framework\Container\Exceptions\NotFoundException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;


/**
 * Class Container
 * @package Framework\Container
*/
class Container
{

    /** @var array  */
    protected $items = [];


    /**
     * @param $name
     * @param callable $closure
    */
    public function set($name, callable $closure)
    {
         $this->items[$name] = $closure;
    }


    /**
     * singleton sharing
     * @param $name
     * @param callable $closure
    */
    public function share($name, callable $closure)
    {
         $this->items[$name] = function () use ($closure) {

              static $resolved;

              if(! $resolved)
              {
                  $resolved = $closure($this);
              }

              return $resolved;
         };
    }


    /**
     * @param $name
    */
    public function has($name)
    {
        return isset($this->items[$name]);
    }


    /**
     * @param $name
     * @return
    */
    public function get($name)
    {
        if($this->has($name))
        {
             return $this->items[$name]($this);
        }

        return $this->autowire($name);
    }


    /**
     * @param $name
    */
    public function autowire($name)
    {
        if(! class_exists($name))
        {
            throw new NotFoundException();
        }

        $reflector = $this->getReflector($name);

        if(! $reflector->isInstantiable())
        {
             throw new NotFoundException();
        }

        /* dump($reflector); */

        if($constructor = $reflector->getConstructor())
        {
            $dependencies = $this->getReflectorConstructorDependencies($constructor);

            /* dump($dependencies); */
            return $reflector->newInstanceArgs($dependencies);
        }

        return new $name();
    }


    /**
     * @param ReflectionMethod $constructor
     * @return array
     */
    protected function getReflectorConstructorDependencies(ReflectionMethod $constructor)
    {
        return array_map(function (ReflectionParameter $dependency) {

            /* dump($dependency); return 'a';*/

            return $this->resolveReflectedDependency($dependency);

        }, $constructor->getParameters());
    }

    /**
     * @param ReflectionParameter $dependency
     * @return mixed
     * @throws NotFoundException
     */
    protected function resolveReflectedDependency(ReflectionParameter $dependency)
    {
        if(is_null($dependency->getClass()))
        {
             throw new NotFoundException();
        }

        return $this->get($dependency->getClass()->getName());
    }


    /**
     * @param $class
     * @throws \ReflectionException
    */
    protected function getReflector($class)
    {
        return new ReflectionClass($class);
    }

    /**
     * @param $name
    */
    public function __get($name)
    {
         return $this->get($name);
    }
}