<?php

class Adder
{
    public function add($left, $right)
    {
        return $left + $right;
    }
}

$adder = new Adder();
var_dump($adder->add(5, 10));
