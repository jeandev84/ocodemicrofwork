<?php
namespace Framework\DependencyInjection;

use Framework\DependencyInjection\Exceptions\ClassIsNotInstantiableException;
use Framework\DependencyInjection\Support\ContainerInterface;
use ReflectionClass;


/**
 * Class Container
 * @package Framework\DependencyInjection
*/
class Container implements ContainerInterface
{
    /** @var array  */
    protected $bindings = [];

    /** @var array  */
    protected $instances = [];


    /**
     * @param $key
     * @param $value
     * @param bool $singleton
    */
    public function bind($key, $value, $singleton = false)
    {
       $this->bindings[$key] = compact('value', 'singleton');
    }


    /**
     * @param $key
     * @param $value
    */
    public function singleton($key, $value)
    {
        return $this->bind($key, $value, true);
    }


    /**
     * @param $key
    */
    public function getBinding($key)
    {
        if(! array_key_exists($key, $this->bindings))
        {
            return null;
        }

        return $this->bindings[$key];
    }


    public function isSingleton($key)
    {
        $binding = $this->getBinding($key);

        if($binding === null)
        {
            return false;
        }

        /* return $binding['singleton'] === true; */
        return $binding['singleton'];
    }


    /**
     * @param $key
    */
    public function singletonResolved($key)
    {
        return array_key_exists($key, $this->instances);
    }


    /**
     * @param $key
     * @return mixed|null
    */
    public function getSingletonInstance($key)
    {
        return $this->singletonResolved($key) ? $this->instances[$key] : null;
    }


    /**
     * @param $key
     * @param array $args
    */
    public function resolve($key, array $args = [])
    {
        $class = $this->getBinding($key);

        if($class === null)
        {
            $class = $key;
        }

        if($this->isSingleton($key) && $this->singletonResolved($key))
        {
             return $this->getSingletonInstance($key);
        }

        $object = $this->buildObject($class, $args);

        return $this->prepareObject($key, $object);
    }


    /**
     * @param $key
     * @param $object
     * @return
    */
    protected function prepareObject($key, $object)
    {
        if($this->isSingleton($key))
        {
            $this->instances[$key] = $object;
        }

        return $object;
    }


    /**
     * @param $class
     * @param array $args
     * @throws \ReflectionException
    */
    protected function buildObject($class, array $args = [])
    {
        $className = $class['value'];
        $reflector = new ReflectionClass($className);

        if(! $reflector->isInstantiable())
        {
            throw new ClassIsNotInstantiableException(
                sprintf('Class [%s] is not resolvable dependency.', $class)
            );
        }

        if($reflector->getConstructor() !== null)
        {
            $constructor = $reflector->getConstructor();
            $dependencies = $constructor->getParameters();

            $args = $this->buildDependencies($args, $dependencies, $class);
        }

        $object = $reflector->newInstanceArgs($args);

        return $object;
    }

    /**
     * @param $args
     * @param $dependencies
     * @param $class
     * @return mixed
    */
    protected function buildDependencies($args, $dependencies, $class)
    {
        foreach ($dependencies as $dependency)
        {
            /* echo $dependency; */
            if($dependency->isOptional()) continue;
            if($dependency->isArray()) continue;

            /* __construct(Foo $foo, $name) */
            $class = $dependency->getClass();
            if($class === null) continue;

            if(get_class($this) === $class->name)
            {
                array_unshift($args, $this);
                continue;
            }

            array_unshift($args, $this->resolve($class->name));
        }

        return $args;
    }


    public function has($key)
    {
        return isset($this->bindings[$key]);
    }

    public function get($key)
    {
        return $this->bindings[$key];
    }

    public function offsetExists($key)
    {
        return array_key_exists($key, $this->bindings);
    }

    public function offsetGet($key)
    {
       return $this->resolve($key);
    }

    public function offsetSet($key, $value)
    {
        return $this->bind($key, $value);
    }

    public function offsetUnset($key)
    {
        unset($this->bindings[$key]);
    }
}