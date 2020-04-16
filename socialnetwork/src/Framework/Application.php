<?php
namespace Framework;

use Whoops\Run as WhoopsRun;
use Whoops\Handler\PrettyPageHandler as WhoopsPrettyPageHandler;


/**
 * Class Application
 * @package Framework
*/
class Application
{

    /**
     * $ composer search whoops
     * $ composer require filp/whoops
    */
    public function run()
    {
        $this->initWhoops();
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
}