<?php
namespace App\Auth\Hashing;

use App\Auth\Hashing\Contracts\Hasher;


/**
 * Class BcryptHasher
 * @package App\Auth\Hashing
*/
class BcryptHasher implements Hasher
{

    /**
     * @param $plain
     * @return mixed|void
     *
     * $this->create('secret');
    */
    public function create($plain)
    {
        $hash = password_hash($plain, PASSWORD_BCRYPT, $this->options());

        if(! $hash)
        {
            throw new \RuntimeException('Bcrypt not supported.');
        }

        return $hash;
    }

    /**
     * @param $plain
     * @param $hash
     * @return bool
     *
     *  $match = $this->check(
     *    'secret', # plain password
     *    '$2y$12$lW.Q2qYuIB9DPq6veSyj7.7dKhfPtyFRnTIgm/4UW9UEyq3BfqFr6' # from database or storage
     *  ));
    */
    public function check($plain, $hash)
    {
         return password_verify($plain, $hash);
    }

    /**
     * Rehash
     * @param $hash
     * @return mixed|void
     *
     * Example:
     *  cost = 12,
     *  $this->needsRehash('$2y$12$lW.Q2qYuIB9DPq6veSyj7.7dKhfPtyFRnTIgm/4UW9UEyq3BfqFr6') => false
     *
     *   if in options we change cost = 14 for example will be return true
     *   $this->needsRehash('$2y$12$lW.Q2qYuIB9DPq6veSyj7.7dKhfPtyFRnTIgm/4UW9UEyq3BfqFr6') => true
    */
    public function needsRehash($hash)
    {
       return password_needs_rehash($hash, PASSWORD_BCRYPT, $this->options());
    }

    /**
     * @return array
    */
    protected function options()
    {
        return [
           'cost' => 12, // 14
        ];
    }
}