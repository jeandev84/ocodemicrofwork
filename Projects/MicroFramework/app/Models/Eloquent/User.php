<?php
namespace App\Models\Eloquent;


use Illuminate\Database\Eloquent\Model;


/**
 * Class User
 * @package App\Models\Eloquent
 */
class User extends Model
{
    // public $table = 'users';

    // par default les champs [ created_at, updated_at] sont crees automatiquement
    // definir a false annulle la creation automatique de ces champs
    // public $dates = false;

    protected $fillable = [
       'name',
       'email',
       'password',
       'remember_identifier',
       'remember_token'
    ];
}