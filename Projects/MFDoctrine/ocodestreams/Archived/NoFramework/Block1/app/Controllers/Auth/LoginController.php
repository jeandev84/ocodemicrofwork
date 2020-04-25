<?php
namespace App\Controllers\Auth;


use App\Auth\Auth;
use App\Controllers\Controller;
use App\Views\View;
use League\Route\RouteCollection;


/**
 * Class LoginController
 * @package App\Controllers\Auth
*/
class LoginController extends Controller
{

    /** @var  */
    protected $view;


    /** @var Auth  */
    protected $auth;


    /** @var RouteCollection  */
    protected $route;


    /**
     * HomeController constructor.
     * @param View $view
     * @param Auth $auth
     * @param RouteCollection $route
     */
    public function __construct(
        View $view,
        Auth $auth,
        RouteCollection $route)
    {
        $this->view = $view;
        $this->auth = $auth;
        $this->route = $route;
    }

    /**
     * Show the login form
     *
     * @param $request
     * @param $response
     * @return mixed
     *
     * $this->view->render($response, 'auth/login.twig')
     */
    public function index($request, $response)
    {
        return $this->view->render($response, 'auth/login.twig');
    }


    /**
     * Sign in user or Login user
     * @param $request
     * @param $response
     * @throws \App\Exceptions\ValidationException
    */
    public function signin($request, $response)
    {
       $data = $this->validate($request, [
           'email' => ['required', 'email'],
           'password' => ['required']
       ]);

       $attempt = $this->auth->attempt($data['email'], $data['password']);

       if(! $attempt)
       {
           dd('Failed authentication!');

       }

       return redirect($this->route->getNamedRoute('home')->getPath());
    }
}