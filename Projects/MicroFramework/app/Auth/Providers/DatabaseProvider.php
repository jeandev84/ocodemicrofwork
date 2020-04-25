<?php
namespace App\Auth\Providers;


use App\Models\User;


/**
 * Class DatabaseProvider
 * @package App\Auth\Providers
 *
 * <Using Eloquent>
*/
class DatabaseProvider implements UserProvider
{

    /**
     * Get User By username
     * @param $username
     * @return mixed|void
     */
    public function getByUsername($username)
    {
        return \App\Models\Eloquent\User::where('email', $username)->first();

        /*
        return $this->db->getRepository(User::class)
                        ->findOneBy(['email' => $username]);
        */
    }

    /**
     * Get User By Id
     * @param $id
     * @return mixed|object|null
    */
    public function getById($id)
    {
        return \App\Models\Eloquent\User::find($id);

        /*
        return $this->db->getRepository(User::class)
                        ->find($id);
        */
    }


    /**
     * Update user password hash
     *
     * @param $id
     * @param $hash
     * @return mixed|void
    */
    public function updateUserPasswordHash($id, $hash)
    {

        return \App\Models\Eloquent\User::find($id)->update([
            'password' => $hash
        ]);

        /*
        $this->db->getRepository(User::class)
                ->find($id)
                ->update([
                    'password' => $hash
                ]);

        $this->db->flush();
        */
    }

    /**
     * Get User By Identifier
     * @param $identifier
     * @return mixed|void
    */
    public function getUserByRememberIdentifier($identifier)
    {
        # where or with to see Eloquent
        return \App\Models\Eloquent\User::where('remember_identifier' , $identifier)
                                         ->first();
        /*
        return $this->db->getRepository(User::class)
                     ->findOneBy([
                        'remember_identifier' => $identifier
                    ]);
        */
    }

    /**
     * Clear Remember Token from the database
     * @param $id
     * @return mixed|void
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function clearUserRememberToken($id)
    {
        return \App\Models\Eloquent\User::find($id)->update([
            'remember_identifier' => 'NULL',
            'remember_token' => 'NULL'
        ]);

        // clear remember token and identifier in the database
        /*
        $this->db->getRepository(User::class)
                 ->find($id)
                 ->update([
                    'remember_identifier' => 'NULL',
                    'remember_token' => 'NULL'
                  ]);

         $this->db->flush();
        */
    }


    /**
     * Set remember Token
     * @param $id
     * @param $identifier
     * @param $hash
    */
    public function setUserRememberToken($id, $identifier, $hash)
    {
        // Persit hashing to the database
        // Check User by id and update fields

        \App\Models\Eloquent\User::find($id)->update([
            'remember_identifier' => $identifier,
            'remember_token' => $hash,
        ]);
        /*
        $this->db->getRepository(User::class)
            ->find($id)
            ->update([
                'remember_identifier' => $identifier,
                'remember_token' => $hash,
            ]);

        $this->db->flush();
        */
    }
}