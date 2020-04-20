<?php
namespace App\Providers;


use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
*/
class AppServiceProvider extends AbstractServiceProvider
{

    protected $provides = [];

    public function register()
    {
        $container = $this->getContainer();
    }
}