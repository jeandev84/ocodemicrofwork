<?php

class AuthService
{
    public function attempt($username, $password)
    {
        // Logic

        return false;
    }
}

$auth = new AuthService();

if (!$auth->attempt('alex', 'password')) {
    var_dump('Login failed');
}
