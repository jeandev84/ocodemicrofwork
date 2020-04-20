<?php

class Controller
{
    public function middleware()
    {
         var_dump('middleware');
    }
}

/**
 * Class HomeController
*/
class HomeController extends Controller
{
    /**
     * HomeController constructor.
    */
    public function __construct()
    {
         $this->middleware();
    }

}

$controller = new HomeController();
