<?php
namespace Framework;

use Framework\DependencyInjection\Container;
use Framework\DependencyInjection\Support\ContainerInterface;
use Whoops\Run as WhoopsRun;
use Whoops\Handler\PrettyPageHandler as WhoopsPrettyPageHandler;


/**
 * Class Application
 * @package Framework
*/
class Application extends Container
{

    /**
     * $ composer search whoops
     * $ composer require filp/whoops
    */
    public function run()
    {
        # Initialise Whoops
        $this->initWhoops();

        # Testing Container
        $this->testContainer();
    }


    /**
     * Initialise error handler Whoops
     * @return $this
    */
    public function initWhoops()
    {
        $whoops = new WhoopsRun();
        $handler = new WhoopsPrettyPageHandler();
        $whoops->pushHandler($handler)->register();
        return $this;
    }


    /**
     * Test how container working
    */
    private function testContainer()
    {

       # Example bind
       // $this->container->bind('foo', 'Bar');
       // $this->container->getBinding('foo');

       # Resolves (Autowiring)
       // $bar = $this->resolve('Framework\\FakeClass\\Bar');
       // \debug($bar);

       # Singleton
       $this->singleton('foo', \Framework\FakeClass\Foo::class);
       $this->resolve('foo');
       $this->resolve('foo');
       $this->resolve('foo');

    }

    /**
     * Determine if given instance container is Container and return
     * @param $container
     * @return bool
    */
    public function IsContainer($container)
    {
       if(! is_object($container))
       {
           throw new \Exception('The given parameter is not object!');
       }
       return $container instanceof ContainerInterface;
    }
}