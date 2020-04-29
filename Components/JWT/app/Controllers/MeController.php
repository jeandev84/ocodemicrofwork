<?php
namespace App\Controllers;


use App\Auth\JwtAuth;
use Psr\Http\Message\{
  ServerRequestInterface as Request,
  ResponseInterface as Response
};



/**
 * Class MeController
 * @package App\Controllers
 */
class MeController extends Controller
{

    /** @var JwtAuth  */
    protected $auth;


    /**
     * MeController constructor.
     * @param JwtAuth $auth
    */
    public function __construct(JwtAuth $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Render the login page
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     *
     *
     * http://localhost:8000/me
     *
     * User informations :
     * {
        "id": 1,
        "email": "jeanyao@ymail.com",
        "password": "$2y$10$SpGJscpvlKL.1.2Ws71XYOOznWzas7CvEYXe1VP3zH6hGw8360AQ.",
        "created_at": "2020-04-29 13:21:35",
        "updated_at": null
     }
    */
    public function index(Request $request, Response $response)
    {
        return $response->withJson($this->auth->getUser());
    }
}