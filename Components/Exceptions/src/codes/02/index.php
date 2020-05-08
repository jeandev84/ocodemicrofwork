<?php

class MaxLengthRule
{
    public function run($string, $max)
    {
        if (strlen($string) > $max) {
            throw new LengthException("[{$string}] must not be greater than {$max}");
        }
    }
}

$rule = new MaxLengthRule();
$rule->run('A longer string', 5);
