<?php
namespace App\Auth\Providers;


use App\Models\User;
use Doctrine\ORM\EntityManager;

/**
 * Class DatabaseProvider
 * @package App\Auth\Providers
*/
class DatabaseProvider implements UserProvider
{
    /**
     * @var EntityManager
    */
    protected $db;


    /**
     * DatabaseProvider constructor.
     * @param EntityManager $db
   */
    public function __construct(EntityManager $db)
    {
          $this->db = $db;
    }

    /**
     * Get User By username
     * @param $username
     * @return mixed|void
     */
    public function getByUsername($username)
    {
        return $this->db->getRepository(User::class)
                        ->findOneBy(['email' => $username]);
    }

    /**
     * Get User By Id
     * @param $id
     * @return mixed|object|null
    */
    public function getById($id)
    {
        return $this->db->getRepository(User::class)
                        ->find($id);
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
        $this->db->getRepository(User::class)
                ->find($id)
                ->update([
                    'password' => $hash
                ]);

        $this->db->flush();
    }

    /**
     * Get User By Identifier
     * @param $identifier
     * @return mixed|void
    */
    public function getUserByRememberIdentifier($identifier)
    {
        return $this->db->getRepository(User::class)
                     ->findOneBy([
                        'remember_identifier' => $identifier
                    ]);
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
        // clear remember token and identifier in the database
        $this->db->getRepository(User::class)
                 ->find($id)
                 ->update([
                    'remember_identifier' => 'NULL',
                    'remember_token' => 'NULL'
                  ]);

         $this->db->flush();
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
        $this->db->getRepository(User::class)
            ->find($id)
            ->update([
                'remember_identifier' => $identifier,
                'remember_token' => $hash,
            ]);

        $this->db->flush();
    }
}