<?php
namespace DP;


/**
 * Class Subscription
 * @package DP
*/
class Subscription
{
      /** @var int */
      public $cost;

      /**
       * @return int
      */
      public function price()
      {
          return 5;
      }

      /**
       * @return bool
      */
      public function priceWithSupport()
      {
           return 2 + 5;
      }

      /**
       * @param $cost
      */
      public function setCost($cost)
      {
          $this->cost += $cost;
      }


      /**
       * @return int
      */
      public function getCost()
      {
          return $this->cost;
      }
}
