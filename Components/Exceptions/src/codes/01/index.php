<?php

class AuthService
{
    public function attempt($username, $password)
    {
        // Logic

        if (true) {
            throw new Exception();
        }
    }
}

$auth = new AuthService();
$auth->attempt('alex', 'password');
