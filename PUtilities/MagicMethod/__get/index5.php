<?php

/**
 * Class User
*/
class User
{

    /** @var string[]  */
    protected $data = [
       'first_name' => 'Alex',
       'last_name'  => 'Garrett-Smith'
    ];


    /**
     * @param $key
     * @return string|null
    */
    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }

}


/**
 * Class Presenter
*/
abstract class Presenter
{

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        if(method_exists($this, $key))
        {
            /** invoke */
            return $this->{$key}();
        }

        return null;
    }
}


/**
 * Class UserPresenter
*/
class UserPresenter extends Presenter
{

    /** @var User  */
    protected $user;


    /**
     * UserPresenter constructor.
     * @param User $user
    */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
    */
    public function fullName()
    {
        return trim($this->user->first_name . ' '. $this->user->last_name);
    }
}


$user = new User();
$presenter = new UserPresenter($user);
# var_dump($presenter->fullName());

var_dump($presenter->fullName);