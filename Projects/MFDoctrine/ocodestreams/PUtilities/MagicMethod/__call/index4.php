<?php

/**
 * Query Builder
 * Class Builder
 */
class Builder
{
   /**
     * @param $key
     * @param $value
   */
   public function where($key, $value)
   {
        var_dump($key, $value);
   }

    /**
     * @param $methodName
     * @param $arguments
   */
   public function __call($methodName, $arguments)
   {
        $key = strtolower(
            str_replace('where', '', $methodName)
        );
        // var_dump($key);
        return $this->where($key, $arguments[0]);
   }
}

$builder = new Builder();
// $builder->where('name', 'Alex');

$builder->whereName('Alex');
$builder->whereEmail('jeanyao@ymail.com');