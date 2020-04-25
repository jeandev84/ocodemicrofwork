<?php
namespace App\Scheduler;

use Carbon\Carbon;
use Cron\CronExpression;


/**
 * Class Event
 * @package App\Scheduler
*/
abstract class Event
{

    use Frequencies;


    # Example generate CRON Expression [ * * * * * ]
    public $expression = '* * * * *';


    /** Handle event */
    abstract public function handle();


    /**
     * @param Carbon $date
     * @return bool
    */
    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }


    /*
    public function isDueToRun()
    {
        # Carbon::now() - give the current time
        return CronExpression::factory($this->expression)->isDue(Carbon::now());
     }
    */
}