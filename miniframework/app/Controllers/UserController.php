<?php
namespace App\Controllers;


/**
 * Class UserController
 * @package App\Controllers
*/
class UserController
{
    /**
     * @param $response
    */
    public function index($response)
    {
        return $response->withJson([
            'test' => true
        ]);
    }
}