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
}

/**
 * Class User
*/
class User
{
     /** @var string  */
     # protected $name = 'Alex';


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


$user = new User();
# string(74) "O:4:"User":1:{s:7:"*data";a:1:{s:5:"email";s:19:"alex@codecourse.com";}}"
var_dump(serialize($user));


/*
$job = new SendUserWelcomeEmail();
$string = base64_encode(serialize($job));

var_dump($string);
string(44) "TzoyMDoiU2VuZFVzZXJXZWxjb21lRW1haWwiOjA6e30="
*/