<?php
namespace App\Core\Middleware;


use App\Core\Http\Request;

/**
 * Class MiddlewareStack
 * @package App\Core\Middleware
 */
class MiddlewareStack
{

   /** @var  callable (firstcalled) */
   protected $start;

   /** @var  array (collections) */
   // protected $stack = [];

   /**
     * MiddlewareStack constructor.
   */
   public function __construct()
   {
       /*
       $this->start = function () {
           dump('start middleware');
       };
       */

       # give start a callable function
       $this->start = function (Request $request) {
           return $request;
       };
   }

    /**
     * @param MiddlewareInterface $middleware
    */
   public function add(MiddlewareInterface $middleware)
   {
       /*
       $next = $this->start;
       dump($next);

       $this->start = function () use ($middleware, $next) {
            return $middleware($next);
       };
       */

       $next = $this->start;
       $this->start = function (Request $request) use ($middleware, $next) {
           return $middleware->__invoke($request, $next); /* or $middleware($request, $next); */
       };

       /* dump($this->start); */
   }


   /**
     * @param Request $request
     * @return mixed
   */
   public function handle(Request $request)
   {
       return call_user_func($this->start, $request);
   }
}

// Description of method add() middleware
# initial
# first middleware (next = initial)
# second middleware (next = first middleware)
# ...
# last middleware (next = (last - 1) middleware
