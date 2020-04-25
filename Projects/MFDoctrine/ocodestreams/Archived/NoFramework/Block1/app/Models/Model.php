<?php
namespace App\Models;


/**
 * Class Model
 * @package App\Models
*/
abstract class Model
{

    /**
     * @param $name
     * @return mixed
    */
    public function __get($name)
    {
        if(property_exists($this, $name))
        {
            return $this->{$name};
        }

     }


     /**
      * @param $name
      * @return bool
     */
     public function __isset($name)
     {
          return property_exists($this, $name) ? true : false;
     }
}