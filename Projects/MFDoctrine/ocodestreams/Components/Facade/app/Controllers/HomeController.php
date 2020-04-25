<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Facades\FileSystem;
use App\Facades\Str;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

/**
 * Class HomeController
 * @package App\Controllers
*/
class HomeController extends Controller
{
    /**
     * Render the home page
     *
     * @param Request $request
     * @param Response $response
     * @param [type] $args
     * @return void
     */
    public function index(Request $request, Response $response, $args)
    {
         # Singleton
         dump(Str::toUpper('hi'));
         dump(Str::toUpper('hi'));
         dump(Str::toUpper('hi'));

         dump(FileSystem::to('/post/index.php'));
         dump(FileSystem::to('/post/index.php'));
         dump(FileSystem::to('/post/index.php'));
         die;
    }


    /*
    public function upperString()
    {
        $str = new Str();
        dump($str->toUpper('hi'));

        dump($this->c->get('str')->toUpper('hi'));
        die;
    }

    public function demo(Request $request, Response $response, $args)
    {

        return $this->c->get('view')->render($response, 'home/index.twig', [
            'appName' => $this->c->get('settings')['app']['name'],
        ]);
    }
    */
}
