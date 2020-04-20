<?php

class View
{
    //
}

class HomeController
{
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function index()
    {
        var_dump($this->view);
    }
}

$controller = new HomeController(new View());
$controller->index();