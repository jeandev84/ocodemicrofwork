<?php
namespace App\Tests\Stubs;


use App\Core\Events\Event;
use App\Core\Events\Listener;



/**
 * Class ListenerSub
 * @package App\Tests\Stubs
*/
class ListenerSub extends Listener
{

    /**
     * @param Event $event
    */
    public function handle(Event $event)
    {

    }
}