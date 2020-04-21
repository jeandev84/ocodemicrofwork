<?php
namespace App\Auth\Hashing\Contracts;


/**
 * Interface Hasher
 * @package App\Auth\Hashing\Contracts
*/
interface Hasher
{
    /**
     * Create a hash
     * @param $plain
     * @return mixed
    */
    public function create($plain);


    /**
     * Check if plain hash match to hash
     *
     * @param $plain
     * @param $hash
     * @return bool
    */
    public function check($plain, $hash);


    /**
     * example if the password hash use be updated
     * @param $hash
     * @return mixed
    */
    public function needsRehash($hash);
}