<?php
namespace App\Controllers;


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


     /** @var Hasher  */
     protected $hash;


    /**
     * HomeController constructor.
     * @param View $view
     * @param Hasher $hash
     */
     public function __construct(View $view, Hasher $hash)
     {
         $this->view = $view;
         $this->hash = $hash;
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