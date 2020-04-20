<?php
namespace App\Exceptions\Traits;


use ReflectionClass;
use ReflectionException;

/**
 * Trait ExposesShortName
 * @package App\Exceptions\Traits
*/
trait ExposesShortName
{
    /**
     * @return string
     * @throws ReflectionException
    */
    public function getShortName()
    {
        return (new ReflectionClass($this))->getShortName();
    }
}