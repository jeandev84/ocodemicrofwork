<?php
namespace App\Controllers;


/**
 * Class DemoController
 * @package App\Controllers
*/
class DemoController
{

     /** @var \PDO  */
     protected $db;


     /**
      * HomeController constructor.
      * @param \PDO $db
     */
     public function __construct(\PDO $db)
     {
         debug($db);
         $this->db = $db;
         die;
     }

     public function index()
     {
         /* $this->db->query('SELECT * FROM default'); */
         echo __METHOD__.'<br>';
     }

     public function home()
     {
        echo __METHOD__.'<br>';
     }
}