<?php
namespace App\Controllers;


/**
 * Class ArticleController
 * @package App\Controllers
 */
class ArticleController extends Controller
{
    public function get($id)
    {
        return $this->response->withStatus(404);
        die('get');
    }

    public function post()
    {
       die('post');
    }


    public function put($id)
    {
        die('put');
    }

    public function delete($id)
    {
        die('put');
    }
}
