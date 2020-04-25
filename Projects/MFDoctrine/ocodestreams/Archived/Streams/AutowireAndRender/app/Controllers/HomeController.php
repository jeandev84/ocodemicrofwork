<?php
namespace App\Controllers;


use App\Views\View;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


/**
 * Class HomeController
 * @package App\Controllers
*/
class HomeController
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
     public function index(RequestInterface $request, ResponseInterface $response)
     {
         return $this->view->render($response, 'home.twig', [
             'name' => 'Billy'
         ]);
     }


     protected function render($view, $data = [], $response = null)
     {
         return $this->view->render($response, $view, $data);
     }
}