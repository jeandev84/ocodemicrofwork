<?php
namespace App\Core\Events;

use ReflectionClass;

/**
 * Class Event
 * @package App\Core\Events
*/
abstract class Event
{
    /** @return string */
    /* abstract public function getName(); */

    /** @return string */
    public function getName()
    {
        return (new ReflectionClass($this))->getShortName();
    }
}