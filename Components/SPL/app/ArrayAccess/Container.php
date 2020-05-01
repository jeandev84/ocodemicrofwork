<?php
namespace Framework\DI;

/**
 * Class Container
 * @package Framework\DI
*/
class Container implements \ArrayAccess
{

    /** @var array  */
    protected $binds = [];


    /**
     * @param $abstract
     * @param \Closure $concrete
    */
    public function bind($abstract, \Closure $concrete)
    {
         $this->binds[$abstract] = $concrete;
    }

    /**
     * @param $abstract
     * @return bool
    */
    public function has($abstract)
    {
        return isset($this->binds[$abstract]);
    }

    /**
     * @param $abstract
     * @return mixed
    */
    public function get($abstract)
    {
         if(! $this->has($abstract))
         {
              return null;
         }

         return $this->binds[$abstract] = $this->binds[$abstract]($this);
    }

    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->bind($offset, $value);
    }

    public function offsetUnset($offset)
    {
        unset($this->binds[$offset]);
    }
}