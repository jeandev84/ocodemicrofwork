<?php
namespace App\Controllers;


use App\Models\Eloquent\Post;
use App\Views\View;

/**
 * Class PostController
 * @package App\Controllers
*/
class PostController
{

    /** @var View  */
    protected $view;


    /**
     * HomeController constructor.
     * @param View $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }


    /**
     * @param $request
     * @param $response
     * @return mixed
     */
    public function index($request, $response)
    {
        # Fetch all data
        // $posts = Post::get();

        # Pagination (composer require illuminate/pagination)
        $posts = Post::paginate(3);

        # Can do
        // $posts = Post::where('title', 'Post xx')->paginate(3);

        return $this->view->render($response, 'posts/index.twig', compact('posts'));
    }
}