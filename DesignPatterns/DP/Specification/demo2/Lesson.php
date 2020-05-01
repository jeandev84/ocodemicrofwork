<?php
namespace DP;


/**
 * Class Lesson
 * @package DP
 */
class Lesson
{

     /** @var bool  */
     public  $active;


     /**
       * Lesson constructor.
       * @param bool $active
     */
     public function __construct(bool $active = true)
     {
         $this->active = $active;
     }

}


