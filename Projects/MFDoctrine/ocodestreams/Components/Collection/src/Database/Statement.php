<?php
namespace Framework\Database;


/**
 * Class Statement
 * @package Framework\Database
 */
class Statement
{

    /** @var PDO */
    protected $connection;


    /**
     * Statement constructor.
     * @param \PDO $connection
    */
    public function __construct(\PDO $connection)
    {
          $this->connection = $connection;
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool|\PDOStatement
     */
    public function execute($sql, $params = [])
    {
        try {

            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

        return $stmt;
    }
}