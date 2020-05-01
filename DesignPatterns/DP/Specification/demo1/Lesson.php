<?php
namespace DP;


/**
 * Class Lesson
 * @package DP
 */
class Lesson
{

     /** @var bool  */
     private  $active = true;

     /**
      * @return bool
     */
     public function isActive()
     {
         return $this->active;
     }
}


$lesson = new \DP\Lesson();

if($lesson->isActive())
{
    echo 'Lesson active';
}
