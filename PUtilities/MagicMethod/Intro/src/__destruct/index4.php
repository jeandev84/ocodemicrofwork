<?php

class Job
{
    public $delay = 0;

    public function delay($delay)
    {
        $this->delay = $delay;
    }
}

trait Dispatchable
{
    public function dispatch()
    {
        return new PendingDispatch(new static);
    }
}

class PendingDispatch
{
    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function delay($delay)
    {
        $this->job->delay($delay);

        return $this;
    }

    public function __destruct()
    {
        var_dump("dispatch job " . get_class($this->job) . ' with a delay of ' . $this->job->delay);
    }
}

class EmailUser extends Job
{
    use Dispatchable;

    public function handle()
    {
        var_dump('send email to user');
    }
}

$job = new EmailUser();
$job->dispatch()->delay(2);