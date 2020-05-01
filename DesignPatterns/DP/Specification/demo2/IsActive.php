<?php
namespace DP;


/**
 * Class IsActive
 * @package DP
*/
class IsActive
{

     /**
      * @param $item
      * @return bool
     */
     public function isSatisfiedBy($item)
     {
          return $item->active === true;
     }
}