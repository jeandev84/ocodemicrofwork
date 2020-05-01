<?php
namespace Framework\Iterator;


/**
 * Class User
 * @package Framework\Iterator
 */
class User
{

    /** @var string */
    public $username;


    /**
     * @param string|null $username
     * @return User
     */
    public function setUsername(?string $username)
    {
        $this->username = $username;

        return $this;
    }


    /**
     * @return string
    */
    public function getUsername(): ?string
    {
        return $this->username;
    }
}