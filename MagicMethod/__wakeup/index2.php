<?php


/**
 * Class SendUserWelcomeEmail
 */
class SendUserWelcomeEmail
{

    protected $user;

    /**
     * SendUserWelcomeEmail constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Do something
     */
    public function handle()
    {
        var_dump('send email to '. $this->user->data['email']);
    }

    /**
     * @return string[]
     *
     * Customize property user
     * That is mean can be serialize
     */
    public function __sleep()
    {
        return ['user'];
    }
}

/**
 * Class User
 */
class User
{

    /** @var array  */
    public $data = [
        'id' => 1,
        'email' => 'alex@codecourse.com'
    ];

    /**
     * @return array
     *
     * Exemple :
     * return ['name']
     *   string(40) "O:4:"User":1:{s:7:"*name";s:4:"Alex";}"
     *
     * return ['data']
     *  string(74) "O:4:"User":1:{s:7:"*data";a:1:{s:5:"email";s:19:"alex@codecourse.com";}}"
     *
     * __sleep() customize the specific data you want to serialize
     *
     * available properties to serialise
     */
    public function __sleep()
    {
        return ['data'];
    }

    /**
     *  available properties to unserialise
    */
    public function __wakeup()
    {
        // Look up user in database by id
        $this->data = [
            'id' => 1,
            'email' => 'alexander@ymail.com'
        ];

    }
}


$user = new User();
$job = new SendUserWelcomeEmail($user);
$string = base64_encode(serialize($job));

// put in database

$job = unserialize(base64_decode($string));
$job->handle();

# string(33) "send email to alexander@ymail.com"
