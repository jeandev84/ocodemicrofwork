<?php
namespace App\Facades;


use App\Facades\Abstracts\Facade;
use App\Helpers\Str as BaseStr;


/**
 * Class Str
 * @package App\Facades
*/
class Str extends Facade
{
     /**
      * @return string
      *
      * Return name of key in the container 'str'
      * or name of class like :
      *   return BaseStr::class or 'str';
      *
     */
     public function getFacadeAccessor()
     {
         return  'str';
     }
}