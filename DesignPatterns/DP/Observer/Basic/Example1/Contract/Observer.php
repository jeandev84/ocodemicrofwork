<?php
namespace DP\Contract;


/**
 * Interface Observer
 *
 * When we notify the observer each attachs observer
 * will be called inside the handle method
 *
 * @package DP\Contract
*/
interface Observer
{
    /**
     * @param $event
     * @return mixed
    */
    public function handle($event);
}