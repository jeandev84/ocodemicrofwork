<?php
namespace App\Scheduler;


/**
 * Class Kernel
 * @package App\Scheduler
*/
class Kernel
{

    /** @var array  */
    protected $events = [];


    public function add($event)
    {
        $this->events[] = $event;
        return $event;
    }


    public function run()
    {
        foreach ($this->getEvents() as $event)
        {
             if(! $event->isDueToRun($this->getDate()))
             {
                 continue;
             }

             $event->handle();
        }
    }


    /**
     * @return array
    */
    public function getEvents()
    {
        return $this->events;
    }
}