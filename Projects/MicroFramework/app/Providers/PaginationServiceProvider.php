<?php
namespace App\Providers;


use App\Auth\Auth;
use App\Security\Csrf;
use App\Session\Flash;
use App\Views\View;
use App\Views\ViewPaginationFactory;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;


/**
 * Class PaginationServiceProvider
 * @package App\Providers
 *
 * You don't need to register in providers it will be work
 * You must to register provider when has defined provides = []
 *
 * BootableServiceProviderInterface contain method boot
 * if service provider implements BootableServiceProviderInterface
 * and service has registred in providers
 * so will be running boot()
*/
class PaginationServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * Boot something before registration
    */
    public function boot()
    {
        $container = $this->getContainer();

        // ServerRequest
        // get current path
        // $container->get('request')->getUri()->getPath();
        // dump($container->get('request')->getQueryParams());

        LengthAwarePaginator::viewFactoryResolver(function () use ($container) {

            return  new ViewPaginationFactory($container->get(View::class));

        });

        LengthAwarePaginator::currentPageResolver(function () use ($container) {

            return $container->get('request')->getUri()->getPath();
        });

        LengthAwarePaginator::currentPageResolver(function () use ($container) {

            return $container->get('request')->getQueryParams()['page'] ?? 1;
        });


        LengthAwarePaginator::defaultView('pagination/_bootstrap.twig');
        # END PAGINATION
    }

    /**
     * Register in container
    */
    public function register()
    {

    }
}