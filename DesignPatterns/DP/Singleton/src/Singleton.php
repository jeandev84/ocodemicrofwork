<?php
namespace DP;


/**
 * Class Singleton
 * @package DP
*/
class Singleton
{

     /** @var Singleton */
     private static $instance;


     /**
      * @return Singleton
     */
     public static function instance()
     {
         if(is_null(self::$instance))
         {
             self::$instance = new static();
         }

         return self::$instance;
     }

     protected function __construct()
     {
     }


     protected function __clone()
     {

     }
}



