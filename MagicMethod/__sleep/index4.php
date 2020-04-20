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

    /**
     * @param $name
     * @return mixed|string|null
     */
     public function get($name)
     {
         return $this->data[$name] ?? null;
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
$string = base64_encode(serialize($job));
// var_dump($string);

// put in database
# var_dump(unserialize(base64_decode($string)));

$job = unserialize(base64_decode($string));
$job->handle();

# string(33) "send email to alex@codecourse.com"




