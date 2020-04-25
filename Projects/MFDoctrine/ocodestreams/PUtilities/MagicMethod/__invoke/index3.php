<?php


/**
 * Class HomeController
*/
class HomeController
{

    /**
     * Give us possibibilty call object of class like function
     * @return string
     */
     public function __invoke()
     {
           /* var_dump('index'); */
           return 'Home index';
     }

     /*
     public function index()
     {
          var_dump('index');
     }
     */
}

$controller = new HomeController();
# var_dump(is_callable($controller)); false(bool)
# $controller->index();

# Call class like function
# $controller();

var_dump($controller());