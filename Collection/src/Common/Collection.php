<?php
namespace Framework\Common;


use Exception;
use Traversable;

/**
 * Class Collection
 * @package Framework\Common
 *
 * Interface Countable give us possibility to access account object
 */
class Collection implements \Countable, \IteratorAggregate
{

    /** @var array  */
    protected $items = [];


    /**
     * Collection constructor.
     * @param mixed $items
    */
    public function __construct($items = [])
    {
        $this->items = $this->resolveItems($items);
    }


    /**
     * @return array
    */
    public function all()
    {
        return $this->items;
    }


    /**
     * @return int
    */
    public function count()
    {
        return count($this->items);
    }


    /**
     * Determine if items is empty or not
     *
     * @return bool
    */
    public function isEmpty()
    {
        return empty($this->items);
    }


    /**
     * @param null $default
     * @return mixed|null
    */
    public function first($default = null)
    {
        return isset($this->items[0]) ? $this->items[0] : $default;
    }


    /**
     * @param null $default
     * @return bool
    */
    public function last($default = null)
    {
        $reversed = array_reverse($this->items);

        return isset($reversed[0]) ? $reversed[0] : $default;
    }


    /**
     * @return $this
    */
    public function keys()
    {
        return new static(array_keys($this->items));
    }


    /**
     * @param callable $callback
     * @return mixed
     */
    public function each(callable $callback)
    {
         foreach ($this->items as $key => $item)
         {
              $callback($item, $key);
         }

         return $this;
    }


    /**
     * @param callable $callback
     * @return Collection
     */
    public function filter(callable $callback = null)
    {
         if($callback)
         {
             /* return array_filter($this->items, $callback); */
             return new static(array_filter($this->items, $callback));
         }

         return new static(array_filter($this->items));
    }


    /**
     * @param callable $callback
    */
    public function map(callable $callback)
    {
          $keys = $this->keys()->all();

          $items = array_map(
              $callback,
              $this->items,
              $keys
          );

          return new static(
              array_combine($keys, $items)
          );
    }


    /**
     * @param $items
     * @return Collection
    */
    public function merge($items)
    {
        return new static(array_merge($this->items, $this->getArrayableItems($items)));
    }

    /**
     * @return false|string
    */
    public function toJson()
    {
       return json_encode($this->items);
    }


    /**
     * @return false|string
    */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Implemented get iterator
     * @return Traversable|void
    */
    public function getIterator()
    {
        /* return new \ArrayIterator($this); */
        return new \ArrayIterator($this->items);
    }

    /**
     * @param $items
     * @return array|void
    */
    protected function resolveItems($items)
    {
        return is_array($items) ? $items : $this->getArrayableItems($items);
    }

    /**
     * @param $items
     */
    protected function getArrayableItems($items)
    {
         if($items instanceof Collection)
         {
             return $items->all();
         }

         return $items;
    }
}