<?php

class Controller
{
    public function middleware()
    {
        var_dump('middleware');
    }
}

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware();
    }
}

$controller = new HomeController();
