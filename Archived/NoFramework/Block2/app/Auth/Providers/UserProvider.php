<?php
namespace App\Auth\Providers;


/**
 * Interface UserProvider
 * @package App\Auth\Providers
*/
interface UserProvider
{
    /**
     * Get User by name, email ...
     * @param $username
     * @return mixed
    */
    public function getByUsername($username);

    /**
     * Get User By Id
     * @param $id
     * @return mixed
    */
    public function getById($id);


    /**
     * Update user password hash
     * @param $id
     * @param $hash
     * @return mixed
    */
    public function updateUserPasswordHash($id, $hash);


    /**
     * Get User by remember identify
     * @param $identifier
     * @return mixed
    */
    public function getUserByRememberIdentifier($identifier);


    /**
     * Clear user remember identifier
     * @param $id
     * @return mixed
    */
    public function clearUserRememberToken($id);


    /**
     * Set user remember token
     * @param $id
     * @param $identifier
     * @param $hash (token hash)
     * @return mixed
     */
    public function setUserRememberToken($id, $identifier, $hash);
}