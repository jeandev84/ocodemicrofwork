<?php

/**
 * Class View
*/
class View
{

}


/**
 * Class HomeController
*/
class HomeController
{
    /** @var View  */
    protected $view;


    /**
     * HomeController constructor.
     * @param View $view
    */
    public function __construct(View $view)
    {
        // var_dump($view);
        $this->view = $view;
    }

    /**
     * Render index view
    */
    public function index()
    {
        var_dump($this->view);
    }
}

$controller = new HomeController(new View());
$controller->index();