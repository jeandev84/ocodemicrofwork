<?php
namespace App\Tests\Unit;


use App\Tests\Stubs\EventStub;
use App\Tests\Stubs\EventStubNoName;
use PHPUnit\Framework\TestCase;


/**
 * Class EventTest
 * Can use block doc /** @test **
 * or name fonction testExample() or test_example()
 * more important add prefix test
 * @package App\Tests\Unit
*/
class EventTest extends TestCase
{
      /** @test */
     public function canGetEventName()
     {
         /*
          $event = new EventStub();
          $this->assertEquals('EventStub', $event->getName());
         */

         $event = new EventStub();
         $this->assertEquals('UserSignedUp', $event->getName());
     }


    /** @test */
    public function itDefaultsToAnEventNameOfTheClass()
    {
        $event = new EventStubNoName();

        $this->assertEquals('EventStubNoName', $event->getName());
    }
}