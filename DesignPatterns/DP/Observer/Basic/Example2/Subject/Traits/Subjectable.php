<?php
namespace DP\Subject\Traits;


use DP\Contract\Observer;

/**
 * Trait Subjectable
 * @package DP\Subject\Traits
 */
trait Subjectable
{
    /** @var array  */
    protected $observers = [];


    /**
     * @param Observer $observer
     * @return mixed|void
     */
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }


    /**
     * @param Observer $observer
     * @return mixed|void
     *
     * observers = [
     *  '0' => observe1,
     *  '1' => observe2,
     *  '2' => observe3
     * ];
     */
    public function detach(Observer $observer)
    {
        for ($i = 0; $i < count($this->observers); $i++)
        {
            if($this->observers[$i] == $observer)
            {
                unset($this->observers[$i]);
            }

            $this->observers = array_values($this->observers);
        }
    }

    /**
     * @return mixed|void
     */
    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->handle($this);
        }
    }

}