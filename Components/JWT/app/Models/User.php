<?php
namespace App\Models;

use App\Auth\Contracts\JwtSubjectInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
*/
class User extends Model implements JwtSubjectInterface
{

    /**
     * Check the primary key User
     *
     * @return int|mixed
    */
    public function getJwtIdentifier()
    {
        return $this->id;
    }

    /*
    public function getCustomClaims()
    {
         return [
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3'
         ];
    }
    */
}