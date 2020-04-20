<?php
namespace Framework\Container;


use Framework\Container\Exceptions\NotFoundException;


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
        if(! $this->has($name))
        {
             throw new NotFoundException();
        }

        return $this->items[$name]($this);
    }

    /**
     * @param $name
    */
    public function __get($name)
    {
         return $this->get($name);
    }
}