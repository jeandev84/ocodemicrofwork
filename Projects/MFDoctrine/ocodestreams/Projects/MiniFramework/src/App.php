<?php
namespace Framework;


use Framework\DependencyInjection\Container;
use Framework\Exceptions\RouteNotFoundException;
use Framework\Http\Response;
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
           },
           'response' => function () {
              return new Response();
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

       try {

           $response = $router->getResponse();

       } catch (RouteNotFoundException $e) {

           if($this->container->has('errorHandler'))
           {
               $response = $this->container->errorHandler;

           }else{

               return;
           }
       }

       /* return $this->process($response); */
       return $this->respond($this->process($response));
   }


    /**
     * @param $callable
     * @return mixed
   */
   protected function process($callable)
   {

       $response = $this->container->response;

       if(is_array($callable))
       {
           if(! is_object($callable[0])) {
               $callable[0] = new $callable[0];
           }
           return call_user_func($callable, $response);
       }

       return $callable($response);
   }


    /**
     * @param $response
   */
   protected function respond($response)
   {
        /* dump($response, true); */

        if(! $response instanceof Response)
        {
            echo $response;
            return;
        }

        header(sprintf(
            'HTTP/%s %s %s',
            '1.1',
            $response->getStatusCode(),
            ''
        ));

        # get headers
        /* debug($response->getHeaders()); */
        foreach ($response->getHeaders() as $header)
        {
             header($header[0]. ': '. $header[1]);
        }

        # show body
        echo $response->getBody();
   }
}