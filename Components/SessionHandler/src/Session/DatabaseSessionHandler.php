<?php
namespace Framework\Session;


use PDO;
use SessionHandlerInterface;


/**
 * Class DatabaseSessionHandler
 * @package Framework\Session
 */
class DatabaseSessionHandler implements SessionHandlerInterface
{

    /** @var PDO */
    protected $db;

    /**
     * DatabaseSessionHandler constructor.
     * @param PDO $db
    */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param string $id (session_id)
     * @return string|void
     */
    public function read($id)
    {
       $statement = $this->db->prepare(
           "SELECT data FROM sessions WHERE id = :id"
       );

       $statement->execute(['id' => $id]);

       if($row = $statement->fetch(PDO::FETCH_OBJ))
       {
            return $row->data;
       }

       return '';
    }

    /**
     * @param string $id (session id, session data)
     * @param string $data
     * @return bool|void
    */
    public function write($id, $data)
    {
         $statement = $this->db->prepare(
             "REPLACE INTO sessions VALUES (:id, :timestamp, :data)"
         );

         $insert = $statement->execute([
             'id' => $id,
             'timestamp' => time(),
             'data' => $data
         ]);

         if($insert)
         {
             return true;
         }

         return false;
    }

    /**
     * FileSystem
     * @param string $path (save path)
     * @param string $name
     * @return bool|void
    */
    public function open($path, $name)
    {
        if($this->db)
        {
            return true;
        }

        return false;
    }

    /**
     * Make sure connection actually to database closed
     * @return bool|void
    */
    public function close()
    {
        $this->db = null;

        if($this->db === null)
        {
            return true;
        }

        return false;
    }

    /**
     * Destroy session id
     * @param string $id (session id)
     * @return bool|void
     */
    public function destroy($id)
    {
        $statement = $this->db->prepare(
            "DELETE FROM sessions WHERE id = :id"
        );

        $delete = $statement->execute(['id' => $id]);

        return $delete ? true : false;
    }


    /**
     * @param int $max (maxlifetime)
     * @return bool|void
    */
    public function gc($max)
    {
       $limit = time() - $max;

       $statement = $this->db->prepare(
           "DELETE FROM sessions WHERE access < :limit"
       );

       $delete = $statement->execute([
           'limit' => $limit
       ]);

       return $delete ? true : false;
    }

}