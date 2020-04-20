<?php
namespace App\Views;


use Psr\Http\Message\ResponseInterface;
use Twig_Environment;


/**
 * Class View
 * @package App\Views
*/
class View
{

    /** @var Twig_Environment  */
    protected $twig;

    /**
     * View constructor.
     * @param \Twig_Environment $twig
    */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @param ResponseInterface $response
     * @param $view
     * @param array $data
     * @return mixed
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
    */
    public function render(ResponseInterface $response, $view, $data = [])
    {
        # $response->getBody()->write('Home');

        $response->getBody()->write(
            $this->twig->render($view, $data)
        );

        return $response;
    }
}