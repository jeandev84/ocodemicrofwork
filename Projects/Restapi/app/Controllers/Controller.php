<?php
namespace App\Controllers;


/**
 * Class Controller
 * @package App\Controllers
 */
class Controller
{
    protected $request;

    protected $response;

    protected $container;

    /**
     * Controller constructor.
     * @param $request
     * @param $response
     * @param $container
    */
    public function __construct($request, $response, $container)
    {
        $this->request = $request;
        $this->response = $response;
        $this->container = $container;
    }
}
