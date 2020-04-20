<?php

class Controller
{
    public function __construct()
    {
        $this->setSomethingUp();
    }

    public function setSomethingUp()
    {
        var_dump('set up in base controller');
    }
}

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->setSomethingElseUp();
    }

    public function setSomethingElseUp()
    {
        var_dump('set up something else');
    }
}

$controller = new HomeController();
