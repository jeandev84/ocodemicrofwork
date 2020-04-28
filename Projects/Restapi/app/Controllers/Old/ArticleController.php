<?php
namespace App\Controllers;


use App\Presenters\ArticlePresenter;
use App\Presenters\ErrorPresenter;
use PDO;

/**
 * Class ArticleController
 * @package App\Controllers
 */
class ArticleController extends Controller
{

    protected $fillable = ['title', 'body'];


    /**
     * Get all articles
     *
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
           // return $this->response->withStatus(404);
           // return $this->response(null, 404);
           // Not found article 30
           return $this->response('Not found article '. $id, 404);
       }

       /*
       return $this->response(json_encode([
           // 'title' => $article->title
       ]), 200);
       */

        return $this->response(json_encode((new ArticlePresenter($article))->present()), 200);
    }

    /**
     * Create an article
     *
     * @return mixed
    */
    public function post()
    {
        $payload = $this->request->getParsedBody();

        if(! isset($payload['title'], $payload['body']))
        {
              return $this->response((new ErrorPresenter([
                  'message' => 'Title and body required',
                  'code' => 404
              ]))->present(), 400);
        }

        // instance of connection
        $db = $this->container->get('db');

        $create = $db->prepare("INSERT INTO articles (title, body) VALUES (:title, :body)");
        $create->execute([
            'title' => $payload['title'],
            'body' => $payload['body']
        ]);

        $article = $db->prepare("SELECT * FROM articles WHERE id = :id");

        $article->execute(['id' => $db->lastInsertId()]);

        $article = $article->fetch(PDO::FETCH_OBJ);

        return $this->response((new ArticlePresenter($article))->present(), 200);
    }


    /**
     * Update an article
     *
     * edit and save
     * @param $id
    */
    public function put($id)
    {
        $payload = $this->request->getParsedBody();

        // array filter for grapping NULL value
        $toFill = array_filter(array_map(function ($column) {

             if(\in_array($column, $this->fillable))
             {
                 return "{$column} = :{$column}";
             }
        }, array_keys($payload)));

        if(empty($toFill))
        {
            return $this->response((new ErrorPresenter([
                'message' => 'No columns selected to update.'
            ]))->present(), 400);
        }

        $update = $this->container->get('db')->prepare("
          UPDATE articles 
          SET ". implode(', ', $toFill)."
          WHERE id = :id
        ");

        $update->execute(array_merge(['id' => $id], $payload));

        if(! $update)
        {
            return $this->response((new ErrorPresenter([
                'message' => 'Entity not updated.'
            ]))->present(), '500');
        }

        $article = $this->container->get('db')
                                   ->prepare("SELECT * FROM articles WHERE id = :id");

        $article->execute(['id' => $id]);
        $article->fetch(PDO::FETCH_OBJ);

        if(! $article)
        {
            return $this->response(null, 404);
        }

        return $this->response(
            (new ArticlePresenter($article))->present(),
        200);
    }

    public function delete($id)
    {
        $delete = $this->container->get('db')
                                  ->prepare(
                                      "DELETE FROM articles 
                                      WHERE id = :id"
                                  );

        $delete->execute(['id' => $id]);

        if(! $delete)
        {
            return $this->response(
                (new ErrorPresenter([
                    'message' => 'Entity not deleted.'
                ]))->present(),
                500
            );
        }

        if(! $delete->rowCount())
        {
            // because nothing was been deleted
            return $this->response(null, 404);
        }

        return  $this->response(null, 200);
    }

    /**
     * @param $id
     */
    protected function getArticleById($id)
    {

    }
}
