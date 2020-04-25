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

    public function handle()
    {
        var_dump('send email');
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
    protected $data = [
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
     */
    public function __sleep()
    {
        # Return the list of properties,
        # we want to serialize for example
        # in this case we want to serialize only the name
        # return ['name'];

        return ['data'];
    }
}

class Encoder
{
    /**
     * @param $data
     * @return string
     */
    static function encode($data)
    {
        return base64_encode($data);
    }

    /**
     * @param $data
     * @return false|string
     */
    static function decode($data)
    {
        return base64_decode($data);
    }
}
$user = new User();
$job = new SendUserWelcomeEmail($user);
# $string = base64_encode(serialize($job));
$string = serialize($job);

# string(120) "O:20:"SendUserWelcomeEmail":1:{s:7:"*user";O:4:"User":1:{s:7:"*data";a:1:{s:5:"email";s:19:"alex@codecourse.com";}}}"
var_dump($string);
