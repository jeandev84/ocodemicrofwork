<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HomeController extends Controller
{
    /**
     * Render the home page
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function index(Request $request, Response $response)
    {
        // $user = User::find(1);

        return $response->withJson(['works' => true]);
    }
}
