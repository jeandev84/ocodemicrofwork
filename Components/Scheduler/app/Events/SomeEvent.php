<?php
namespace App\Events;


use App\Scheduler\Event;


/**
 * Class SomeEvent
 * @package App\Events
*/
class SomeEvent extends Event
{

    /*
      Can add dependencies in constructor
      public function __construct() {}
    */

    /**
     * Handle the event
     *
     * @return void
     */
     public function handle()
     {
          var_dump($this->expression);
     }
}