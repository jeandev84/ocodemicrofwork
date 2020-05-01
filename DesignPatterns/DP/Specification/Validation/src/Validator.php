<?php
namespace DP;


/**
 * Class Validator
 * @package DP
*/
class Validator
{

     /** @var array  */
     protected $rules = [];


    /**
     * @param $method
     * @param $arguments
     * @return Validator
     */
     public function __call($method, $arguments)
     {
          /* dump($method, $arguments); */

          $this->rules[] = [
              'object' => $this->getRule($method),
              'argument' => $arguments
          ];

          return $this;
     }

     /**
      * @param $rule
      * @return mixed
     */
     protected function getRule($rule)
     {
          return new $rule;
     }
}