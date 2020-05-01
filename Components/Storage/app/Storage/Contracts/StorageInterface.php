<?php
namespace App\Storage\Contracts;


/**
 * Interface StorageInterface
 * @package App\Storage\Contracts
*/
interface StorageInterface
{
     /**
      * @param $key
      * @param $value
      * @return mixed
     */
     public function set($key, $value);


     /**
      * @param $key
      * @return mixed
     */
     public function get($key);


     /**
      * @param $key
      * @return mixed
     */
     public function delete($key);


     /**
      * @return mixed
     */
     public function destroy();


     /**
      * @return mixed
     */
     public function all();
}