<?php

use App\Scheduler\Event;
use PHPUnit\Framework\TestCase;


/**
 * Class EventTest
*/
class EventTest extends TestCase
{

    /**  $ ./vendor/bin/phpunit */
    /*
    public function testSampleTest()
    {
       $this->assertTrue(true);
    }
    */


    /**
     * @test
    */
    public function eventHasDefaultCronExpression()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $this->assertEquals('* * * * *', $event->expression);
    }
}