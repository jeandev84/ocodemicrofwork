<?php
namespace Framework\Common;


/**
 * Class Collection
 * @package Framework\Common
 */
class Collection
{

    /** @var array  */
    protected $items = [];


    /**
     * Collection constructor.
     * @param array $items
    */
    public function __construct(array $items = [])
    {
        $this->items = $items;
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
}