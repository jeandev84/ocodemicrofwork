<?php
namespace App\Providers;


use App\Auth\JwtAuth;
use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Class AuthServiceProvider
 * @package App\Providers
*/
class AuthServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
       JwtAuth::class
    ];


    public function register()
    {
        $container = $this->getContainer();

        $container->share(JwtAuth::class, function () {
            return new JwtAuth();
        });
    }
}