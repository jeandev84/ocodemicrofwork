<?php

/**
 * Class SomeClass
*/
class SomeClass
{

    /**
     * Called Last
    */
    public function __destruct()
    {
       var_dump('destruct');
    }
}

$class = new SomeClass();
