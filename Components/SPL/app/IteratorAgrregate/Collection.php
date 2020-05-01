<?php
namespace Framework\Iterator;


use Exception;
use Traversable;

/**
 * Class Collection
 * @package Framework\Iterator
 */
class Collection implements \IteratorAggregate
{

    /** @var array  */
     protected $items = [];

     /**
      * Collection constructor.
      * @param array $items
     */
     public function __construct(array $items)
     {
         $this->items = $items;
     }

     /**
      * @return \ArrayIterator|Traversable
     */
     public function getIterator()
     {
        return new \ArrayIterator($this->items);
     }


     public function get()
     {
         return $this->items;
     }
}