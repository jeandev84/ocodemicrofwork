<?php
namespace Framework\Database;


/**
 * Class Seeder
 * @package Framework\Database
 */
class ArticleSeeder
{

     /**
      * @param \PDO $connection
     */
     public function append(\PDO $connection)
     {
         for($i = 1; $i < 4; $i++)
         {
             $stmt = $connection->prepare(
                 'INSERT INTO `articles` (title, body, created_at) VALUES(:title, :body, :created_at)'
             );

             $stmt->execute([
                 'title' => 'Article '. $i,
                 'body' => 'Article '. $i . ' body',
                 'created_at' => (new \DateTime())->format('Y-m-d H:i:s')
             ]);
         }
     }
}