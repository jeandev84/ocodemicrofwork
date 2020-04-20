<?php

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

$user = new User();
echo $user->toJson();
echo $user;
