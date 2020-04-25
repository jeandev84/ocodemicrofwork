<?php

use App\Scheduler\Event;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;


/**
 * Class EventTest
*/
class EventTest extends TestCase
{

    /**
     * @test
    */
    public function eventHasDefaultCronExpression()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $this->assertEquals('* * * * *', $event->expression);
    }


    /**
     * @test
     */
    public function eventShouldBeRun()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $this->assertTrue($event->isDueToRun(Carbon::now()));
    }


    /**
     * @test
     */
    public function eventShouldNotBeRun()
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->expression = '0 0 1 * *';

        /* $this->assertFalse($event->isDueToRun(Carbon::now())); */
        $this->assertFalse($event->isDueToRun(Carbon::create(2017, 10, 2, 0, 0, 0)));
    }
}