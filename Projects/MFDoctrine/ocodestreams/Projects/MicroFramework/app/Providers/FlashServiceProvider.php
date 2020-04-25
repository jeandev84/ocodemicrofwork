<?php
namespace App\Providers;


use App\Session\Contracts\SessionStore;
use App\Session\Flash;
use League\Container\ServiceProvider\AbstractServiceProvider;


/**
 * Class FlashServiceProvider
 * @package App\Providers
 */
class FlashServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
       Flash::class
    ];

    public function register()
    {
       $container = $this->getContainer();

       $container->share(Flash::class, function () use ($container){
           return new Flash(
               $container->get(SessionStore::class)
           );
       });
    }
}