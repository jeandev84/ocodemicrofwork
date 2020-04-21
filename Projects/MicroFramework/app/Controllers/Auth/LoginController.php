<?php
namespace App\Controllers\Auth;


use App\Views\View;


/**
 * Class LoginController
 * @package App\Controllers\Auth
*/
class LoginController
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

}