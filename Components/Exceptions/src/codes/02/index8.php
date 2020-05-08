<?php

class Adder
{
    public function add(int $left, int $right)
    {
        return $left + $right;
    }
}

$adder = new Adder();
var_dump($adder->add(5, 5.5));
