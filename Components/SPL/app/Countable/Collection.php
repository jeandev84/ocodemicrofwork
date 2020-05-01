<?php
namespace Framework\Collection;


/**
 * Class Collection
 * @package Framework\Collection
 *
 * Countable :
 *  permit to acces to count() items Collection's object
 *  example : echo count(new Collection());
 *
 * ArrayAccess permit to access to object as array
*/
class Collection implements \Countable
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
       * @return int
      */
      public function count()
      {
          return count($this->items);
      }
}