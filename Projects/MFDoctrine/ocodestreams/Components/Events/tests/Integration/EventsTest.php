<?php
namespace App\Tests\Integration;


use App\Core\Events\Dispatcher;
use App\Tests\Stubs\EventStub;
use App\Tests\Stubs\ListenerSub;
use PHPUnit\Framework\TestCase;

/**
 * Class EventsTest
 * @package App\Tests\Integration
 */
class EventsTest extends TestCase
{

    /** @test */
    public function itCanDispatchAnEvent()
    {
         $dispatcher = new Dispatcher();

         $event = new EventStub();
         $mockedListener = $this->createMock(ListenerSub::class);

         $mockedListener->expects($this->once())
                        ->method('handle')
                        ->with($event);


         $dispatcher->addListener('UserSignedUp', $mockedListener);

         $dispatcher->dispatch($event);
    }


    /** @test */
    public function itCanDispatchAnEventWithMultipleListeners()
    {
        $dispatcher = new Dispatcher();

        $event = new EventStub();
        $mockedListener = $this->createMock(ListenerSub::class);
        $anotherMockedListener = $this->createMock(ListenerSub::class);

        $mockedListener->expects($this->once())->method('handle')->with($event);
        $anotherMockedListener->expects($this->once())->method('handle')->with($event);


        $dispatcher->addListener('UserSignedUp', $mockedListener);
        $dispatcher->addListener('UserSignedUp', $anotherMockedListener);

        $dispatcher->dispatch($event);

    }
}