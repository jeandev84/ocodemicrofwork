<?php

/**
 * Class DemoClass
*/
class DemoClass
{

}

$class = new DemoClass();

# Can not call an undefined method
# $class->getSomething();


/*
 Will resolve this case with magic method __call()
*/

/**
 * Class SomeClass
 */
class SomeClass
{
    /**
     * @param $name
     * @param $arguments
    */
    public function __call($name, $arguments)
    {
        var_dump($name, $arguments);
    }
}

$class = new SomeClass();

# Can not call an undefined method
$class->getSomething();