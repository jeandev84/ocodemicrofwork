<?php
namespace App\Core;


use App\Core\Http\Request;
use App\Core\Middleware\MiddlewareInterface;
use App\Core\Middleware\MiddlewareStack;

/**
 * Class App as Kernel class
 * @package App\Core
 */
class App
{

   /** @var MiddlewareStack  */
   protected $middleware;


   /**
     * App constructor.
     * @param MiddlewareStack $middleware
   */
   public function __construct(MiddlewareStack $middleware)
   {
       $this->middleware = $middleware;
   }

   /**
     * @param MiddlewareInterface $middleware
   */
   public function add(MiddlewareInterface $middleware)
   {
      $this->middleware->add($middleware);
   }


   /**
    * Run application
    * @return void
   */
   public function run()
   {
       # advanced middleware with request
       $result = $this->middleware->handle(new Request());


       # run resources and
       dump('run app', $result);
   }
}