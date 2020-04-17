<?php
namespace Framework;


use Framework\DependencyInjection\Container;
use Framework\Routing\Router;


/**
 * Class App
 * @package Framework
*/
class App
{

   /** @var Container */
   protected $container;

    /**
     * App constructor.
    */
   public function __construct()
   {
       $this->container = new Container([
           'router' => function () {
             return new Router();
           }
       ]);
   }

   /**
     * @return Container
   */
   public function getContainer()
   {
       return $this->container;
   }


    /**
     * @param $uri
     * @param $handler
    */
   public function get($uri, $handler)
   {
         $this->container->router->addRoute($uri, $handler, ['GET']);
   }


    /**
     * @param $uri
     * @param $handler
    */
    public function post($uri, $handler)
    {
        $this->container->router->addRoute($uri, $handler, ['POST']);
    }


    /**
     * @param $uri
     * @param $handler
     * @param array $methods
    */
    public function map($uri, $handler, array $methods = ['GET'])
    {
        $this->container->router->addRoute($uri, $handler, $methods);
    }


   /**
     * Run application
   */
   public function run()
   {
       $router = $this->container->router;
       $router->setPath($_SERVER['PATH_INFO'] ?? '/');

       $response = $router->getResponse(); /* debug($response); */

       return $this->process($response);
   }


   /**
     * @param $callable
   */
   protected function process($callable)
   {
       return $callable();
   }
}