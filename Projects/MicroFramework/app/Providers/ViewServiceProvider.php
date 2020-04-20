<?php
namespace App\Providers;

use App\Views\View;
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

        $container->share(View::class, function () {

            $loader = new Twig_Loader_Filesystem(base_path('views'));

            $twig = new Twig_Environment($loader, [
                'cache' => false
            ]);

            return new View($twig);
        });

    }
}