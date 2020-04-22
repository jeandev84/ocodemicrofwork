<?php
namespace App\Controllers;


use App\Auth\Auth;
use App\Auth\Hashing\Contracts\Hasher;
use App\Cookie\CookieJar;
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

     /** @var CookieJar  */
     protected $cookie;


    /**
     * HomeController constructor.
     * @param View $view
     * @param CookieJar $cookie
     */
     public function __construct(View $view, CookieJar $cookie)
     {
         $this->view = $view;
         $this->cookie = $cookie;
     }

     /**
      * @param $request
      * @param $response
      * @return mixed
     */
     public function index($request, $response)
     {
         $this->cookie->clear('abc');

         return $this->view->render($response, 'home.twig');
     }

}