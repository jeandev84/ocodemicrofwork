<?php
namespace App\Controllers\Auth;


use App\Auth\Auth;
use App\Controllers\Controller;
use App\Session\Flash;
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


    /** @var Flash  */
    protected $flash;


    /**
     * HomeController constructor.
     * @param View $view
     * @param Auth $auth
     * @param RouteCollection $route
     */
    public function __construct(
        View $view,
        Auth $auth,
        RouteCollection $route,
        Flash $flash)
    {
        $this->view = $view;
        $this->auth = $auth;
        $this->route = $route;
        $this->flash = $flash;
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
       # Validate data by rules
       $data = $this->validate($request, [
           'email' => ['required', 'email'],
           'password' => ['required']
       ]);

       # Check authentication status and remember user (has remember ?)
       $attempt = $this->auth->attempt($data['email'], $data['password'], isset($data['remember']));

       if(! $attempt)
       {
           /* dd('Failed authentication!'); */

           $this->flash->now('error', 'Could not sign in you in with those details.');
           return redirect($request->getUri()->getPath()); // redirect to login page
       }

       return redirect($this->route->getNamedRoute('home')->getPath());
    }
}