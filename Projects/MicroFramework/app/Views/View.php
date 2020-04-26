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
     * @param $view
     * @param array $data
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function make($view, $data = [])
    {
        return $this->twig->render($view, $data);
    }

    /**
     * @param ResponseInterface $response
     * @param $view
     * @param array $data
     * @return mixed
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     *
     * $response->getBody()->write('Home');
    */
    public function render(ResponseInterface $response, $view, $data = [])
    {
        $response->getBody()->write(
            $this->make($view, $data)
        );

        return $response;
    }


    /**
     * Definit des variables globalement
     * @param array $data
    */
    public function share(array $data)
    {
        foreach ($data as $key => $value)
        {
            $this->twig->addGlobal($key, $value);
        }
    }
}