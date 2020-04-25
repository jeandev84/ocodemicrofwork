<?php
namespace App\Providers;


use Illuminate\Database\Capsule\Manager;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;


/**
 * Class DatabaseServiceProvider
 * @package App\Providers
*/
class DatabaseServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{


    public function register()
    {
         //
    }

    public function boot()
    {
         $container = $this->getContainer();

         $config = $container->get('config');

         $capsule = new Manager();
         $capsule->addConnection($config->get('db.'. env('DB_TYPE', 'mysql')));

         $capsule->setAsGlobal();
         $capsule->bootEloquent();
    }

    /*
    protected function registerOld()
    {
        $container = $this->getContainer();
        $config = $container->get('config');

        $container->share(EntityManager::class, function () use($config) {

            $entityManager = EntityManager::create(
                $config->get('db.'. env('DB_TYPE')),
                Setup::createAnnotationMetadataConfiguration(
                    [base_path('app')],
                    $config->get('app.debug') // true or false
                )
            );

            return $entityManager;
        });
    }
    */
}