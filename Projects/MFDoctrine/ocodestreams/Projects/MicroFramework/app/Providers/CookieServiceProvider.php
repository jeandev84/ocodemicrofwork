<?php
namespace App\Providers;


use App\Cookie\CookieJar;
use League\Container\ServiceProvider\AbstractServiceProvider;


/**
 * Class CookieServiceProvider
 * @package App\Providers
*/
class CookieServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
       CookieJar::class
    ];

    public function register()
    {
       $container = $this->getContainer();

       $container->share(CookieJar::class, function () use ($container){
           return new CookieJar();
       });
    }
}