<?php
namespace App\Providers;

use App\Auth\Hashing\Contracts\Hasher;
use App\Auth\Hashing\BcryptHasher;
use App\Security\Csrf;
use App\Session\Contracts\SessionStore;
use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Class CsrfServiceProvider
 * @package App\Providers
*/
class CsrfServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        Csrf::class
    ];


    public function register()
    {
        $container = $this->getContainer();

        $container->share(Csrf::class, function () use ($container){
            return new Csrf(
                $container->get(SessionStore::class)
            );
        });
    }
}