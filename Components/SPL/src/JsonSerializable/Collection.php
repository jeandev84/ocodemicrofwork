<?php
namespace Framework\JsonSerializable;


use Exception;
use Traversable;


/**
 * Class Collection
 * @package Framework\JsonSerializable
 */
class Collection implements \IteratorAggregate, \JsonSerializable
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


     /**
      * To json
      * @return array|mixed
     */
     public function jsonSerialize()
     {
         return array_map(function ($item) {
             if($item instanceof Model)
             {
                 return $item->toArray();
             }

             return $item;
         }, $this->items);
     }


     /**
      * @return false|string
     */
     public function __toString()
     {
         return json_encode($this->jsonSerialize());
     }
}