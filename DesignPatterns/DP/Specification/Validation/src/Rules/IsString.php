<?php
namespace DP\Rules;


/**
 * Class IsString
 * @package DP\Rules
*/
class IsString
{

    /**
      * @param $input
      * @return bool
     */
     public function isSatisfiedBy($input)
     {
         return is_string($input);
     }
}