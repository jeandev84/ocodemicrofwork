<?php
namespace DP\Contract;


/**
 * Interface Subject
 * @package DP\Contract
*/
interface Subject
{

    /**
     * It the login to the Subject
     * attach the observer
     * Update or insert data
     *
     * @param Observer $observer
     * @return mixed
     */
    public function attach(Observer $observer);


    /**
     * Remove the observer
     *
     * @param Observer $observer
     * @return mixed
     */
    public function detach(Observer $observer);


    /**
     * Notify the observer
     *
     * @return mixed
    */
    public function notify();
}