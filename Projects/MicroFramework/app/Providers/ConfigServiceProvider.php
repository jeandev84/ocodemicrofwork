<?php
namespace App\Providers;


use App\Config\Config;
use League\Container\ServiceProvider\AbstractServiceProvider;



/**
 * Class ConfigServiceProvider
 * @package App\Providers
*/
class ConfigServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
       // Config::class,
        'config'
    ];

    public function register()
    {
         $this->getContainer()->share('config', function () {

             $loader = new \App\Config\Loaders\ArrayLoader([
                 'app' => base_path('config/app.php'),
                 'cache' => base_path('config/cache.php'),
             ]);

             return (new Config())->load([
                 $loader
             ]);
         });
    }
}