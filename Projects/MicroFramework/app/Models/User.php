<?php
namespace App\Models;


/**
 * Class User
 * @package App\Models
 *
 * @Entity @Table(name="users")
*/
class User
{

     /**
      * @GeneratedValue(strategy="AUTO")
      * @Id @Column(name="id", type="integer", nullable=false)
     */
     protected $id;


     /**
      * @name @Column(type="string")
     */
     protected $name;

     /**
      * @email @Column(type="string")
     */
     protected $email;


     /**
      * @password @Column(type="string")
     */
     protected $password;


     /**
      * @remember_token @Column(type="string")
     */
     protected $remember_token;

     /**
      * @remember_identifier @Column(type="string")
     */
     protected $remember_identifier;

     /**
      * @return mixed
     */
     public function getId()
     {
        return $this->id;
     }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @param mixed $remember_token
     * @return User
     */
    public function setRememberToken($remember_token)
    {
        $this->remember_token = $remember_token;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRememberIdentifier()
    {
        return $this->remember_identifier;
    }

    /**
     * @param mixed $remember_identifier
     * @return User
     */
    public function setRememberIdentifier($remember_identifier)
    {
        $this->remember_identifier = $remember_identifier;
        return $this;
    }


}