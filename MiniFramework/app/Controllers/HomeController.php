<?php
namespace App\Controllers;


use Framework\DependencyInjection\Container;

/**
 * Class HomeController
 * @package App\Controllers
*/
class HomeController
{

     /** @var Container  */
     # protected $container;


     /**
      * HomeController constructor.
      * @param Container $container
     */
     /*
     public function __construct(Container $container)
     {
         $this->container = $container;
     }
     */

     public function index($response)
     {
         /* return 'Home';
         return json_encode([
             'message' => 'collections of numbers telephone',
             'status'  => 'success'
         ]);

          return $response->setBody('Home')->withStatus(403);
         */

         return $response->setBody('Home');
     }
}