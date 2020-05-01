<?php
namespace Framework\Session;


use SessionHandlerInterface;


/**
 * Class DatabaseSessionHandler
 * @package Framework\Session
 */
class DatabaseSessionHandler implements SessionHandlerInterface
{
    
    public function read($session_id)
    {

    }

    public function write($session_id, $session_data)
    {
        // TODO: Implement write() method.
    }


    public function close()
    {
        // TODO: Implement close() method.
    }

    public function destroy($session_id)
    {
        // TODO: Implement destroy() method.
    }

    public function gc($maxlifetime)
    {
        // TODO: Implement gc() method.
    }

    public function open($save_path, $name)
    {
        // TODO: Implement open() method.
    }
}