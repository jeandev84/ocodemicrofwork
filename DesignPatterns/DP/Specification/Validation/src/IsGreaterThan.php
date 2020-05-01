<?php
namespace DP;


/**
 * Class IsGreaterThan
 * @package DP
*/
class IsGreaterThan
{

    /**
      * @param $input
      * @param $argument
      * @return bool
     */
     public function isSatisfiedBy($input, $argument)
     {
         return strlen($input) > $argument[0];
     }
}