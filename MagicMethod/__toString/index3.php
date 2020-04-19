<?php

/**
 * Class User
 * Entity
*/
class User
{
   /**
     * @var string[]
   */
   protected $data = [
       'email' => 'alex@codecourse.com',
       'name' => 'Alex Garrett-Smith',
   ];

   /**
     * @return string
   */
   public function __toString()
   {
       return $this->toJson();
   }


   /**
     * @return false|string
   */
   public function toJson()
   {
       return json_encode($this->data) ."\n";
   }
}


/**
 * Class UserController
 * Controller
*/
class UserController
{
    /**
     * show action
    */
    public function show()
    {
        $user = new User();
        return $user;
    }
}


$controller = new UserController();
echo $controller->show();
