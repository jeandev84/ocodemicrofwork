<?php
namespace App\Views\Extensions;


use League\Route\RouteCollection;
use Twig_Extension;

/**
 * Class PathExtension
 * @package App\Views\Extensions
 *
 * Rend les fonctions disponibles dans la vue
 * Exemple Helper : if(! function_exists('route') { call_user_func('route') }
 *
*/
class PathExtension extends Twig_Extension
{
    /**
     * @var RouteCollection (an other case it's Router)
    */
    protected $route;

    /**
     * PathExtension constructor.
     * @param RouteCollection $route
    */
    public function __construct(RouteCollection $route)
    {
        $this->route = $route;
    }

    public function getFunctions()
    {
       return [
          new \Twig_SimpleFunction('route', [$this, 'route'])
       ];
    }


    public function route($name)
    {
        return $this->route->getNamedRoute($name)->getPath();
    }
}