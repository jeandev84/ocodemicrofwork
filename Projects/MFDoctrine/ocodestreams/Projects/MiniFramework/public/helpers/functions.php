<?php

if(! function_exists('debug'))
{
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
}



if(! function_exists('dump'))
{
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
}