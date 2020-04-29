<?php
namespace App\Controllers\Auth;

use App\Auth\JwtAuth;
use App\Controllers\Controller;
use App\Models\User;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};


/**
 * Class LoginController
 * @package App\Controllers\Auth
*/
class LoginController extends Controller
{

    /** @var JwtAuth  */
    protected $auth;


    /**
     * LoginController constructor.
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
    */
    public function index(Request $request, Response $response)
    {
         if(! $token = $this->auth->attempt('jean@ymail.com', 'secret123'))
         {
             return $response->withStatus(401);
         }

         return $response->withJson([
             'token' => $token
         ]);
    }
}
