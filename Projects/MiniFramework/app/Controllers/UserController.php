<?php
namespace App\Controllers;

use App\Models\User;
use PDO;

/**
 * Class UserController
 * @package App\Controllers
*/
class UserController
{
    /** @var \PDO  */
    protected $db;


    /**
     * UserController constructor.
     * @param \PDO $db
    */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    /**
     * @param $response
    */
    public function index($response)
    {
        $users = $this->db->query("SELECT * FROM users")
                          ->fetchAll(PDO::FETCH_CLASS, User::class);

        /* debug($users, true); */

        return $response->withJson($users);
    }


    /**
     * Fill data to users table
     * @param $response
     * @return mixed
     */
    public function migrate($response)
    {
        /* dump($this->db, true); */

        $users = ['1' => 'Jean', '2' => 'Michelle', '3' => 'Lucy'];

        foreach ($users as $id => $name)
        {
            $stmt = $this->db->prepare('INSERT INTO users (id, name) VALUES (:id, :name)');
            $stmt->execute([
                'id' => $id,
                'name' => $name
            ]);
        }

        return $response->withJson([
            'status' => 'migrated'
        ]);
    }

    /**
     * @param $response
     * @return mixed
    */
    public function list($response)
    {
        return $response->withJson([
            'test' => true
        ]);
    }
}