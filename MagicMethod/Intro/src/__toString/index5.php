<?php

class InputField
{
    public function __toString()
    {
        return '
            <input
                type="' . $this->type . '"
                name="' . $this->name . '"
            >
        ';
    }

    public function __get($key)
    {
        return $this->attributes[$key] ?? '';
    }
}

class TextField extends InputField
{
    protected $attributes = [];

    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
}

$username = new TextField();
$username->type = 'text';
$username->name = 'username';

echo $username;