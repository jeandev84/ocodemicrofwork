<?php

class Adder
{
    public function add(float $left, float $right)
    {
        return $left + $right;
    }
}

$adder = new Adder();
var_dump($adder->add(5, 'alex'));
