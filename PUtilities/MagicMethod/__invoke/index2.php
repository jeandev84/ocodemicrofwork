<?php

/**
 * Class NoCallbableClass
*/
class NoCallbableClass
{
    // no constructor
}

$class = new NoCallbableClass();

# Can't invoke class like this because $class is not string
# And object $class is not callable
# $class();

# false (bool)
var_dump(is_callable($class));


/**
 * Class SomeClass
 * With magic method __invoke()
*/
class SomeClass
{
     public function __invoke()
     {
         var_dump('invoked');
     }
}

$class = new SomeClass();

# Can invoke class like $class()
# because method __invoke() make class callable
$class();

# true (bool)
var_dump(is_callable($class));
