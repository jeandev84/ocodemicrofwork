<?php
namespace DP\Contract;

use SplObserver;


/**
 * Class Event
 * @package DP\Contract
*/
abstract class Event implements \SplSubject
{

    /** @var  */
    protected $storage;


    /**
     * Event constructor.
    */
    public function __construct()
    {
         $this->storage = new \SplObjectStorage();
    }


    /**
     * @param SplObserver $observer
    */
    public function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    /**
     * @param SplObserver $observer
    */
    public function detach(SplObserver $observer)
    {
        // if observer dos not contains in storage we'll be return false
        if(! $this->storage->contains($observer))
        {
            return;
        }

        $this->storage->detach($observer);
    }


    /**
     *
    */
    public function notify()
    {
         // if no observers
        if(! count($this->storage))
        {
            return;
        }

        foreach ($this->storage as $observer)
        {
            $observer->update($this);
        }
    }
}