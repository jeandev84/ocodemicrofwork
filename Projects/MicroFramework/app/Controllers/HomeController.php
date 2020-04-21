<?php
namespace App\Controllers;


use App\Auth\Auth;
use App\Auth\Hashing\Contracts\Hasher;
use App\Views\View;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


/**
 * Class HomeController
 * @package App\Controllers
*/
class HomeController extends Controller
{

     /** @var View  */
     protected $view;



    /**
     * HomeController constructor.
     * @param View $view
     * @param Auth $auth
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
         return $this->view->render($response, 'home.twig');
     }

}