<?php

/*
__set_state()
var_export() Recupere an data to executed an php code
*/


/**
 * Class SomeClass
*/
class SomeClass
{
    /**
     * @param $an_array
    */
    public function __set_state($an_array)
    {
         // var_dump('set state');
    }
}

$class = new SomeClass();

var_export($class);