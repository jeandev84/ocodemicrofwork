<?php
namespace App\Providers;

use App\Views\View;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;
use Twig_Environment;
use League\Container\ServiceProvider\AbstractServiceProvider;



/**
 * Class ViewServiceProvider
 * @package App\Providers
*/
class ViewServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        View::class
    ];

    public function register()
    {
        $container = $this->getContainer();

        $config = $container->get('config');

        $container->share(View::class, function () use ($config) {

            $loader = new Twig_Loader_Filesystem(base_path('views'));

            /* dump($config->get('cache.views.path')); */

            $twig = new Twig_Environment($loader, [
                'cache' => $config->get('cache.views.path'), // true or false
                'debug' => $config->get('app.debug'), // true or false
            ]);

            # Adding extension Twig Debug function dump() will be available
            if($config->get('app.debug'))
            {
                $twig->addExtension(new Twig_Extension_Debug());
            }

            return new View($twig);
        });

    }
}