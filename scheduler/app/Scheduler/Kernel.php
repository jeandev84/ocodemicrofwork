<?php
namespace App\Scheduler;


use Carbon\Carbon;

/**
 * Class Kernel
 * @package App\Scheduler
*/
class Kernel
{

    /** @var array  */
    protected $events = [];


    /** @var Carbon */
    protected $date;


    /**
     * @param $event
     * @return mixed
    */
    public function add(Event $event)
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
     * @param Carbon $date
    */
    public function setDate(Carbon $date)
    {
        $this->date = $date;
    }


    /**
     * @return Carbon
    */
    public function getDate()
    {
       if(! $this->date)
       {
           return Carbon::now();
       }

       return $this->date;
    }

    /**
     * @return array
    */
    public function getEvents()
    {
        return $this->events;
    }
}