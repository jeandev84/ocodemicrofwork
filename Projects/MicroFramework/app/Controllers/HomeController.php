<?php
namespace App\Controllers;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


/**
 * Class HomeController
 * @package App\Controllers
*/
class HomeController
{
     /**
      * @param $request
      * @param $response
      * @return mixed
     */
     public function index(RequestInterface $request, ResponseInterface $response)
     {
         $response->getBody()->write('Home');

         return $response;
     }
}