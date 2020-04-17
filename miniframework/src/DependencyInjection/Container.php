<?php
namespace Framework\DependencyInjection;

# use ArrayAccess;


/**
 * Class Container
 * @package Framework\DependencyInjection
*/
class Container implements \ArrayAccess
{

    /** @var array (as collections) */
    protected $items = [];


    /** @var array  (as instance) */
    protected $cache = [];


    /**
     * Set the item
     * @param mixed $offset
     * @param mixed $value
    */
    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }


    /**
     * Get the item
     * @param mixed $offset
     * @return mixed|void
    */
    public function offsetGet($offset)
    {
        if(! $this->has($offset))
        {
            return null;
        }


        if(isset($this->cache[$offset]))
        {
            return $this->cache[$offset];
        }

        $item = $this->items[$offset]($this);

        $this->cache[$offset] = $item;

        return $item;
    }


    /**
     * Remove item
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        if($this->has($offset))
        {
            unset($this->items[$offset]);
        }
    }


    /**
     * Determine if has item stored
     * @param mixed $offset
     * @return bool|void
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }


    /**
     * Determine if has item stored
     * @param mixed $offset
     * @return bool|void
    */
    public function has($offset)
    {
        return $this->offsetExists($offset);
    }


    /**
     * Get item called has property
     * @param $property
    */
    public function __get($property)
    {
        return $this->offsetGet($property);
    }
}