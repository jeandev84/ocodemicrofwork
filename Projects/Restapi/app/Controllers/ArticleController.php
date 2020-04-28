<?php
namespace App\Controllers;


use PDO;

/**
 * Class ArticleController
 * @package App\Controllers
 */
class ArticleController extends Controller
{

    /**
     * @param $id
     * @return mixed
   */
    public function get($id)
    {
       $stmt = $this->container->get('db')
                               ->prepare("SELECT * FROM articles WHERE id = :id");

       $stmt->execute(['id' => $id]);

       $article = $stmt->fetch(PDO::FETCH_OBJ);

       if(! $article)
       {
           return $this->response->withStatus(404);
       }

       return $this->response(json_encode([
           'title' => $article->title
       ]), 200);
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
