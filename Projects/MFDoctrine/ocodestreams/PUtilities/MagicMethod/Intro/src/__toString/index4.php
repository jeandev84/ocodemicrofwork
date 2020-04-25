<?php

class InputField
{
    public function __toString()
    {
        return '
            <input
                type="' . $this->attributes['type'] . '"
                name="' . $this->attributes['name'] . '"
            >
        ';
    }
}

class TextField extends InputField
{
    protected $attributes = [];

    public function setType($type)
    {
        $this->attributes['type'] = $type;
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
}

$username = new TextField();
$username->setType('text');
$username->setName('username');

echo $username;