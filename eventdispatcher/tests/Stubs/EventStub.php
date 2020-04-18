<?php
namespace App\Tests\Stubs;

use App\Core\Events\Event;


/**
 * Class EventStub
 * @package App\Tests\Stubs
*/
class EventStub extends Event
{

    /** @return string */
    public function getName()
    {
        return 'UserSignedUp';
    }
}