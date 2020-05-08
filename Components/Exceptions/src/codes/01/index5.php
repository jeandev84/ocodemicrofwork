<?php

class AuthService
{
    public function attempt($username, $password)
    {
        // Logic

        if (true) {
            throw new Exception('Login failed');
        }
    }
}

$auth = new AuthService();

try {
    $auth->attempt('alex', 'password');
} catch (Exception $e) {
    var_dump($e->getMessage());
}
