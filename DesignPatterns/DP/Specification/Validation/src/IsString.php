<?php
namespace DP;



/**
 * Class IsString
 * @package DP
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