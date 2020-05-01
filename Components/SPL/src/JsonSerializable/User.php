<?php
namespace Framework\JsonSerializable;


/**
 * Class User
 * @package Framework\JsonSerializable
 */
class User extends Model
{

    /** @var array  */
    protected $attributes = [];

    /**
     * @param $name
     * @param $value
    */
    public function __set($name, $value)
    {
         $this->attributes[$name] = $value;
    }

    /**
     * @return array
    */
    public function toArray()
    {
        return $this->attributes;
    }


    /**
     * @return false|string
    */
    public function __toString()
    {
        return json_encode($this->toArray());
    }
}