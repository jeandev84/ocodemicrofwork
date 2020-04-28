<?php
namespace App\Controllers;


/**
 * Class Controller
 * @package App\Controllers
 */
class Controller
{

    /** @var  */
    protected $request;

    /** @var  */
    protected $response;

    /** @var  */
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


    public function response($content='', $httpStatus = 200)
    {
        $body = $this->response->getBody();
        $body->write($content);

        return $this->response->withStatus($httpStatus)
                              ->withBody($body);
    }
}
