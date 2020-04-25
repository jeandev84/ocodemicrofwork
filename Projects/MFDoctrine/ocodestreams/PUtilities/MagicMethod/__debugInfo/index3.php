<?php

/**
 * Class User
*/
class User
{

    /** @var string  */
    protected $someOther = 'abc';


    /** @var string[]  */
    protected $data = [
         'email' => 'jeanyao@ymail.com',
        #'password' => 'secret'
    ];

    /**
     * Debug info must return an array data
     * @return array
     *
     * Retourne les donnees sans afficher la visibilite par example
    */
    public function __debugInfo()
    {
         /* return $this->data; */
         return get_object_vars($this);
    }
}

$user = new User();

var_dump($user);

/*
Sans Debug info on aura ceci :
object(User)#1 (2) {
  ["someOther":protected]=>
  string(3) "abc"
  ["data":protected]=>
  array(1) {
    ["email"]=>
    string(17) "jeanyao@ymail.com"
  }
}

Avec Debug Info on obtient ceci :
object(User)#1 (2) {
  ["someOther"]=>
  string(3) "abc"
  ["data"]=>
  array(1) {
    ["email"]=>
    string(17) "jeanyao@ymail.com"
  }
}

*/