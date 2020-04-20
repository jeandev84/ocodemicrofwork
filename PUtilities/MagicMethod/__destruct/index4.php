<?php

/**
 * Class Job
*/
class Job
{
    /** @var int  */
    public $delay = 0;

    /**
     * @param $delay
    */
    public function delay($delay)
    {
         $this->delay = $delay;
    }

    /**
     * @return int
    */
    public function getDelay()
    {
        return $this->delay;
    }
}


/**
 * Trait Dispatchable
 * Usability method usable an other classes
*/
trait Dispatchable
{
    public function dispatch()
    {
        // var_dump('dispatch');
        return new PendingDispatch(new static());
    }
}


/**
 * Class PendingDispatch
 * pending job dispatch
*/
class PendingDispatch
{

    /** @var Job  */
    protected $job;

    /**
     * PendingDispatch constructor.
     * @param Job $job
    */
    public function __construct(Job $job)
    {
        $this->job = $job;
        /* var_dump($job); */
    }

    /**
     * @param $delay
     * @return PendingDispatch
    */
    public function delay($delay)
    {
         $this->job->delay($delay);

         return $this;
    }

    /**
     * Destructor
    */
    public function __destruct()
    {
        var_dump("dispatch job ". get_class($this->job). ' with a delay of '. $this->job->delay);
    }
}


/**
 * Class EmailUser
*/
class EmailUser extends Job
{
    use Dispatchable;

    /**
     * Do Something
    */
    public function handle()
    {
        var_dump('send email to user');
    }
}

$job = new EmailUser();
$job->dispatch()->delay(2);

/*
----------------------------------------------------
string(40) "dispatch job EmailUser with a delay of 2"
*/