<?php
namespace App\Tests\Unit;

use App\Tests\Stubs\EventStub;
use App\Tests\Stubs\ListenerSub;
use PHPUnit\Framework\TestCase;


/**
 * Class ListenerTest
 * @package App\Tests\Unit
*/
class ListenerTest extends TestCase
{

    /** @test */
    public function handleMethodThrowsErrorIfInvalidEventGiven()
    {
         $this->expectException(\TypeError::class);


         $listener = new ListenerSub();
         $listener->handle('not an event');
    }


    /** @test */
    public function handleMethodAcceptsAnEvent()
    {
        $listener = new ListenerSub();
        $listener->handle(new EventStub());

        $this->addToAssertionCount(1);
    }

}