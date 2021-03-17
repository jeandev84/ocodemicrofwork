<?php
namespace App;


use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;



/**
 * Class Chat
 * @package App
*/
class Chat implements MessageComponentInterface
{

     /** @var array  */
     protected $clients = [];


     /**
      * @param ConnectionInterface $connection
     */
     public function onOpen(ConnectionInterface $connection)
     {
          var_dump($connection);
          echo 'Open';
     }


     /**
      * @param ConnectionInterface $from
      * @param string $msg
      * @return mixed
     */
     public function onMessage(ConnectionInterface $from, $msg)
     {

     }


     /**
      * @param ConnectionInterface $connection
     */
     public function onClose(ConnectionInterface $connection)
     {

     }


     /**
      * @param ConnectionInterface $connection
      * @param Exception $e
     */
     public function onError(ConnectionInterface $connection, Exception $e)
     {
         $connection->close();
     }
}