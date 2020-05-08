<?php

class Adder
{
    public function add($left, $right)
    {
        if (!is_numeric($left)) {
            throw new InvalidArgumentException("Left operand must be a number");
        }

        if (!is_numeric($right)) {
            throw new InvalidArgumentException("Right operand must be a number");
        }

        return $left + $right;
    }
}

$adder = new Adder();
var_dump($adder->add(5, 'alex'));
