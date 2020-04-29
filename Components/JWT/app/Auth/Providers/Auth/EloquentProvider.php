<?php
namespace App\Auth\Providers\Auth;


use App\Auth\Providers\Auth\AuthProviderInterface;
use App\Models\User;


/**
 * Class EloquentProvider
 * @package App\Auth\Providers\Auth
 *
 * Eloquent Auth Provider
*/
class EloquentProvider implements AuthProviderInterface
{


    /**
     * @param $username
     * @param $password
     * @return |null |null
     */
    public function byCredentials($username, $password)
    {
        // check if has user by given email
        if(! $user = User::where('email', $username)->first())
        {
            return null;
        }

        // Check if user password match hashed password from database
        if(! password_verify($password, $user->password))
        {
            return null;
        }

        // return user
        return $user;
    }


    /**
     * @param $id
    */
    public function byId($id)
    {
        // TODO: Implement byId() method.
    }
}