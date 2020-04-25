<?php

/**
 * Class User
*/
class User
{

}


/**
 * Class HomeController
*/
class HomeController
{

    /** @var User  */
    protected $user;


    /**
     * HomeController constructor.
    */
    public function __construct()
    {
        $this->user = new User();
    }


    public function index()
    {
        var_dump($this->user);
    }
}

$controller = new HomeController();
$controller->index();