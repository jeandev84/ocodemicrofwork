<?php
namespace App\Controllers;


use App\Controllers\Controller;
use Slim\Http\Request;
use Slim\Http\Response;


/**
 * Class MeController
 * @package App\Controllers
 */
class MeController extends Controller
{

    /**
     * Render the login page
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     *
     *
     * http://localhost:8000/me
     */
    public function index(Request $request, Response $response)
    {
        return $response->withJson([
            'works' => true
        ]);
    }
}