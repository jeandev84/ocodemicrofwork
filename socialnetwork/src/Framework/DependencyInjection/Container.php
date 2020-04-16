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


    /**
     * @param $key
     * @param $value
    */
    public function bind($key, $value)
    {
       $this->bindings[$key] = $value;
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

        return $this->buildObject($class);
    }

    /**
     * @param $className
     * @param array $args
     * @throws \ReflectionException
    */
    protected function buildObject($className, array $args = [])
    {
        $reflector = new ReflectionClass($className);

        if(! $reflector->isInstantiable())
        {
            throw new ClassIsNotInstantiableException(
                sprintf('Class [%s] is not resolvable dependency.', $className)
            );
        }

        if($reflector->getConstructor() !== null)
        {
            $constructor = $reflector->getConstructor();
            $dependencies = $constructor->getParameters();

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
        }

        $object = $reflector->newInstanceArgs($args);

        return $object;
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