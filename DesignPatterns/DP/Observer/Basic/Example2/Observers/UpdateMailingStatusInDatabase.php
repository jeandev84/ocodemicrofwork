<?php
namespace DP\Observers;

use DP\Contract\Observer;


/**
 * Class UpdateMailingStatusInDatabase
 * @package DP\Observers
*/
class UpdateMailingStatusInDatabase implements Observer
{

    public function handle($event)
    {
         dump('Update status in db : '. $event->getUser()->id);
    }
}


