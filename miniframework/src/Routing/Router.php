<?php
namespace Framework\Routing;


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
    */
   public function addRoute($uri, $handler)
   {
       $this->routes[$uri] = $handler;
   }


   /**
     * @return mixed
   */
   public function getResponse()
   {
       return $this->routes[$this->path];
   }
}