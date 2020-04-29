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
     *
     * username : jeanyao@ymail.com
     * password : secret123
    */
    public function index(Request $request, Response $response)
    {
         $email = $request->getParam('email');
         $password = $request->getParam('password');

         if(! $token = $this->auth->attempt($email, $password))
         {
             return $response->withStatus(401);
         }

         return $response->withJson([
             'token' => $token
         ]);
    }
}
