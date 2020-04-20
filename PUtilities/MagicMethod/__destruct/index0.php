<?php

/**
 * Class SomeClass
*/
class SomeClass
{
    /**
     * SomeClass constructor.
     * Called First
    */
    public function __construct()
    {
        var_dump('Hello!');
    }

    /**
     * Called Last
    */
    public function __destruct()
    {
       var_dump('Bye');
    }

    public function index()
    {
        echo "Comment vas-tu? \n";
    }
}

$class = new SomeClass();
$class->index();

/*
string(6) "Hello!"
Comment vas-tu?
string(3) "Bye"
*/