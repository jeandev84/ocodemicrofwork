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
                $this->getAttribute('type'),
                $this->getAttribute('name')
            )."\n";
    }

    /**
     * @param $key
     * @return |null
    */
    public function getAttribute($key)
    {
        return $this->attributes[$key] ?? null;
    }
}

/**
 * Class TextField
 */
class TextField extends InputField
{

    /** @var string */
    protected $attributes = [];


    /** @param string $type */
    public function setType($type)
    {
        $this->attributes['type'] = $type;
    }

    /** @param string $name */
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
}

$username = new TextField();
$username->setType('text');
$username->setName('username');

echo $username;