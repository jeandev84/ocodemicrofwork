<?php
namespace App\Controllers;


use App\Models\User;
use App\Views\View;
use Doctrine\ORM\EntityManager;
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


     /** @var EntityManager  */
     protected $db;


    /**
     * HomeController constructor.
     * @param View $view
     * @param EntityManager $db
     */
     public function __construct(View $view, EntityManager $db)
     {
         $this->view = $view;
         $this->db = $db;
     }

     /**
      * @param $request
      * @param $response
      * @return mixed
     */
     public function index(RequestInterface $request, ResponseInterface $response)
     {
         $user = $this->db->getRepository(User::class)
                          ->find(1);

         return $this->view->render($response, 'home.twig', [
             'user' => $user
         ]);
     }


    /**
     * @param $view
     * @param array $data
     * @param null $response
     * @return mixed|ResponseInterface
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     protected function render($view, $data = [], $response = null)
     {
         return $this->view->render($response, $view, $data);
     }
}