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


     /**
      * Helper method for update data
      * @param array $columns
      *
      * Update data without Doctrine
     */
     public function update(array $columns)
     {
         foreach ($columns as $column => $value)
         {
              $this->{$column} = $value;
         }
     }
}