<?php


/**
 * @param $variable
 * @param bool $die
*/
function debug($variable, $die = false)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    if($die) die;
}


/**
 * @param $variable
 * @param bool $die
 */
function dump($variable, $die = false)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    if($die) die;
}