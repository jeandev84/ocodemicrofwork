<?php
namespace Framework\Routing;


use Framework\Exceptions\MethodNotAllowedException;
use Framework\Exceptions\RouteNotFoundException;

/**
 * Class Router
 * @package Framework\Routing
*/
class Router
{

   /** @var string */
   protected $path;


   /** @var array  */
   protected $routes = [];


   /** @var array  */
   protected $methods = [];


   /**
     * Set a current path
     * @param string $path
   */
   public function setPath($path = '/')
   {
       $this->path = $path;
   }

    /**
     * @param $uri
     * @param $handler
     * @param array $methods
   */
   public function addRoute($uri, $handler, array $methods = ['GET'])
   {
       $this->routes[$uri] = $handler;
       $this->methods[$uri] = $methods;
   }


   /**
     * @return mixed
   */
   public function getResponse()
   {
       if(! isset($this->routes[$this->path]))
       {
           throw new RouteNotFoundException(
               sprintf('No route registred for (%s)', $this->path)
           );
       }

       if(! in_array($_SERVER['REQUEST_METHOD'], $this->methods[$this->path]))
       {
           throw new MethodNotAllowedException();
       }

       return $this->routes[$this->path];
   }
}