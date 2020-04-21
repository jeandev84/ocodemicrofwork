<?php
namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Views\View;


/**
 * Class LoginController
 * @package App\Controllers\Auth
*/
class LoginController extends Controller
{

    /** @var  */
    protected $view;


    /**
     * HomeController constructor.
     * @param View $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * @param $request
     * @param $response
     * @return mixed
     */
    public function index($request, $response)
    {
        return $this->view->render($response, 'auth/login.twig');
    }


    /**
     * @param $request
     * @param $response
     * @throws \App\Exceptions\ValidationException
    */
    public function signin($request, $response)
    {
       $this->validate($request, [
           'email' => ['required', 'email'],
           'password' => ['required']
       ]);
    }
}