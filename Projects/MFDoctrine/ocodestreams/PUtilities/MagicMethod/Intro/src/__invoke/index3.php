<?php

class HomeController
{
    public function __invoke()
    {
        return 'Home view';
    }
}

$controller = new HomeController();

var_dump($controller());
