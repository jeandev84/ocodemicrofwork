<?php

class SendUserWelcomeEmail
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        var_dump('send email to ' . $this->user->data['email']);
    }

    public function __sleep()
    {
        return ['user'];
    }
}

class User
{
    public $data = [
        'id' => 1,
        'email' => 'alex@codecourse.com'
    ];

    public function __sleep()
    {
        return ['data'];
    }
    
    public function __wakeup()
    {
        // Look up user in database by id

        $this->data = [
            'id' => 1,
            'email' => 'alexander@codecourse.com'
        ];
    }
}

$user = new User();
$job = new SendUserWelcomeEmail($user);

$string = base64_encode(serialize($job));

// put in database

$job = unserialize(base64_decode($string));
$job->handle();
