<?php

/*
 * Form Builder
*/

/**
 * Class InputField
*/
class InputField
{

    /**
     * @return string
    */
    public function __toString()
    {
        return sprintf('<input type="%s" name="%s">',
                $this->type,
                $this->name
            );
    }

    /**
     * @param $key
     * @return |null
    */
    public function __get($key)
    {
         return $this->attributes[$key] ?? '';
    }
}



/**
 * Class TextField
 */
class TextField extends InputField
{

    /** @var string */
    protected $attributes = [];


    /**
     * @param $key
     * @param $value
    */
    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
}

$username = new TextField();
$username->type = 'text';
$username->name = 'username';

echo $username ."\n";