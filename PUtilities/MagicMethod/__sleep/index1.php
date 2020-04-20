<?php

/*
class SomeClass
{
    public $property = 'value';
}

$class = new SomeClass();
var_dump(serialize($class));
string(47) "O:9:"SomeClass":1:{s:8:"property";s:5:"value";}"

$some = unserialize(serialize($class));
var_dump($some);
object(SomeClass)#2 (1) {
  ["property"]=>
  string(5) "value"
}
*/


/**
 * Class SomeClass
 */
class SomeClass
{
    public $property = 'value';
}


$class = new SomeClass();
var_dump(serialize($class));

# string(47) "O:9:"SomeClass":1:{s:8:"property";s:5:"value";}"


