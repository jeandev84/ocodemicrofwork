<?php

/**
 * Class User
*/
class User
{

    /** @var string[]  */
    protected $data = [
       'first_name' => 'Alex',
       'last_name'  => 'Garrett-Smith'
    ];

    /**
     * @param $key
     * @return string
    */
    public function __get($key)
    {
        if(method_exists($this, $method = 'get'. ucfirst($key) . 'Attribute'))
        {
             /* var_dump($method); */
             return $this->{$method}();
        }

        return $this->data[$key] ?? null;
    }

    /**
     * @return string
    */
    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' '. $this->last_name);
    }


    /**
     * @return string
    */
    public function getFirstNameAttribute()
    {
        return $this->first_name;
    }

}

$user = new User();
var_dump($user->fullName);




