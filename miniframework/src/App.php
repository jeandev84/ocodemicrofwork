<?php
namespace Framework;


use Framework\DependencyInjection\Container;


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
       $this->container = new Container();
   }

   /**
     * @return Container
   */
   public function getContainer()
   {
       return $this->container;
   }
}