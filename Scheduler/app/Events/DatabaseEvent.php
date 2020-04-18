<?php
namespace App\Events;


use App\Scheduler\Event;

/**
 * Class DatabaseEvent
 * @package App\Events
 */
class DatabaseEvent extends Event
{

     /**
      * @return string
     */
     public function handle()
     {
         return 'update database everydays';
     }
}