<?php


/**
 * Class HomeController
*/
class HomeController
{

    /**
     * HomeController constructor.
    */
    public function __construct()
    {
        $this->setSomethingUp();
    }


    protected function setSomethingUp()
    {
        var_dump('set up');
    }
}

$controller = new HomeController();
