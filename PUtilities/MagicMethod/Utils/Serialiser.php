<?php
namespace Utils;


use Utils\Entity\User;

/**
 * Class Serialiser
 * @package Framework\Utils
*/
class Serialiser
{

     /** @var array  */
     protected $cache = [];

     /**
      * @param $context
      * @return string
     */
     public function serialise($name, $context)
     {
         $this->cache[$name] = serialize($context);
     }

     /**
      * @param $name
      * @return bool
     */
     public function serialised($name)
     {
         return isset($this->cache[$name]);
     }

    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
     public function deserialise($name)
     {
          if(! $this->serialised($name))
          {
             $this->abortIf(sprintf('This name %s is not serialized!', $name));
          }
          return unserialize($this->cache[$name]);
     }

     /**
      * @param $message
      * @throws \Exception
     */
     protected function abortIf($message)
     {
         throw new \Exception($message);
     }
}

spl_autoload_register(function ($classname) {
    $path =  __DIR__. str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $classname);

    @require_once $path.'.php';
});


$serialiser = new Serialiser();

$user = new User();
$user->setName('jean');
$user->setEmail('jeanyao@ymail.com');
$user->setPassword('secret');

$serialiser->serialise('user.object', $user);

try {
    $context = $serialiser->deserialise('user.object');
} catch (\Exception $e) {
}