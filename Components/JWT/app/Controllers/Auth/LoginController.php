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

         /* dump($token);
           array:6 [
              "sub" => 1
              "iss" => "http://localhost:8000/auth/login"
              "iat" => 1588178146
              "nbf" => 1588178146
              "jti" => "726b5a514c4d4d7663707a38756c4e4b3170755073515264413461416d656b43"
              "exp" => 1588178746
           ]
         */
         return $response->withJson([
             'token' => $token
         ]);
    }
}
/*
{
    "token": {
        "sub": 1
    }
}

{
    "token": {
        "sub": 1,
        "iss": "http://localhost:8000/auth/login",
        "iat": 1588177988,
        "nbf": 1588177988,
        "jti": "667178534b5a3972506875514a44446f556c386853786249784a4759744c5677",
        "exp": 1588178588
    }
}
*/
