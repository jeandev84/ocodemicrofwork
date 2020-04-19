<?php

/**
 * Class Controller
*/
class Controller
{
    /**
     * Controller constructor.
    */
    public function __construct()
    {
        $this->setSomethingUp();
    }


    /**
     * Set something up
    */
    public function setSomethingUp()
    {
        var_dump('set up in base controller');
    }
}


/**
 * Class HomeController
*/
class HomeController extends Controller
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setSomethingElseUp();
    }


    /**
     * Set something else up
    */
    public function setSomethingElseUp()
    {
        var_dump('set up something base else');
    }
}

$controller = new HomeController();
