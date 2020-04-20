<?php
namespace App\Facades;


use App\Facades\Abstracts\Facade;


/**
 * Class FileSystem
 * @package App\Facades
*/
class FileSystem extends Facade
{
     /**
      * @return string
     */
     public function getFacadeAccessor()
     {
         return  'filesystem';
     }
}