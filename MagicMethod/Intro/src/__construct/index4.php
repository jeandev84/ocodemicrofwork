<?php

class User
{
    //
}

class HomeController
{
    protected $user;

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