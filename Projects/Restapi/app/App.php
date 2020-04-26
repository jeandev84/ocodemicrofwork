<?php

namespace App;

use Slim\App as Slim;


/**
 * Class App
 * @package App
*/
class App extends Slim
{
    /**
     * @param array $methods
     * @param $pattern
     * @param $controller
     * @return \Slim\Interfaces\RouteInterface|void
    */
    public function route(array $methods, $pattern, $controller)
    {
        return $this->map($methods, $pattern, function ($request, $response, $args) use ($controller) {
            $callable = new $controller($request, $response, $this);
            return call_user_func_array([$callable, $request->getMethod()], $args);
        });
    }
}
