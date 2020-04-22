<?php
namespace App\Controllers\Auth;


use App\Auth\Auth;
use App\Controllers\Controller;



/**
 * Class LogoutController
 * @package App\Controllers\Auth
 */
class LogoutController extends Controller
{

    /** @var Auth  */
    protected $auth;


    /**
     * LogoutController constructor.
     * @param Auth $auth
    */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Logout
     *
     * @param $request
     * @param $response
     * @return mixed
     *
     */
    public function logout($request, $response)
    {
        $this->auth->logout();

        return redirect('/');
    }
}