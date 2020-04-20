<?php

class Builder
{
    public function where($key, $value)
    {
        var_dump($key, $value);
    }

    public function __call($name, $arguments)
    {
        $key = strtolower(str_replace('where', '', $name));

        return $this->where($key, $arguments[0]);
    }
}

$builder = new Builder();

$builder->whereEmail('alex@codecourse.com');
