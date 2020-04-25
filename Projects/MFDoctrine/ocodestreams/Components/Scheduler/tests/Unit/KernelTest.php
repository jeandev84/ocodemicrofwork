<?php

use App\Scheduler\Kernel;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use App\Scheduler\Event;



/**
 * Class KernelTest
 */
class KernelTest extends TestCase
{

    /**
     * @test
     */
     public function canGetEvents()
     {
         $kernel = new Kernel();

         $this->assertEquals([], $kernel->getEvents());
     }


    /**
     * @test
     */
    public function canAddEvents()
    {
        $event = $this->getMockForAbstractClass(Event::class);


        $kernel = new Kernel();
        $kernel->add($event);


        $this->assertCount(1, $kernel->getEvents());
    }


    /**
     * @test
     */
    public function addingEventReturnsEvent()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $kernel = new Kernel();
        $result = $kernel->add($event);

        $this->assertInstanceOf(Event::class, $result);
    }


    /**
     * @test
     */
    public function canAddNotEvent()
    {
        $this->expectException(TypeError::class);


        $kernel = new Kernel();
        $kernel->add('fake event');

    }


    /**
     * @test
     */
    public function canSetDate()
    {
        $kernel = new Kernel();
        $kernel->setDate(Carbon::now());

        $this->assertInstanceOf(Carbon::class, $kernel->getDate());
    }


    /**
     * @test
     */
    public function hasDefaultDateSet()
    {
        $kernel = new Kernel();

        $this->assertInstanceOf(Carbon::class, $kernel->getDate());
    }



    /**
     * @test
     */
    public function runExpectedEvent()
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->expects($this->once())->method('handle');


        $kernel = new Kernel();
        $kernel->add($event);

        $kernel->run();
    }




    /**
     * @test
     */
    public function dontRunUnExpectedEvent()
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->monthly();

        $event->expects($this->never())->method('handle');


        $kernel = new Kernel();
        $kernel->setDate(Carbon::create(2017, 10, 2, 0, 0, 0));
        $kernel->add($event);

        $kernel->run();
    }
}