<?php
namespace App\Core\Events;


/**
 * Class Listener
 * @package App\Core\Events
*/
abstract class Listener
{
   /** @param Event $event */
   abstract public function handle(Event $event);
}