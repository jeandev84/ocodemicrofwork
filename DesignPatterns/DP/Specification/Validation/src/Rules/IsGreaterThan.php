<?php
namespace DP\Rules;


/**
 * Class IsGreaterThan
 * @package DP\Rules
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