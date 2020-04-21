<?php
namespace App\Providers;


use App\Views\View;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;


/**
 * Class ViewShareServiceProvider
 * @package App\Providers
 *
 * You don't need to register in providers it will be work
 * You must to register provider when has defined provides = []
 *
 * BootableServiceProviderInterface contain method boot
 * if service provider implements BootableServiceProviderInterface so will be running boot()
*/
class ViewShareServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * Boot something before registration
    */
    public function boot()
    {
        $container = $this->getContainer();

        $container->get(View::class)->share([
            'config' => $container->get('config')
        ]);
    }

    /**
     * Register in container
    */
    public function register()
    {


    }
}