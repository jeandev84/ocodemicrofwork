<?php
namespace App\Core\Middleware;


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
       $this->start = function () {
           dump('start middleware');
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
       $this->start = function () use ($middleware, $next) {
           return $middleware->__invoke($next);
       };

       /* dump($this->start); */
   }


   /**
     * @return mixed
   */
   public function handle()
   {
       return call_user_func($this->start);
   }
}

// Description of method add() middleware
# initial
# first middleware (next = initial)
# second middleware (next = first middleware)
# ...
# last middleware (next = (las - 1) middleware
