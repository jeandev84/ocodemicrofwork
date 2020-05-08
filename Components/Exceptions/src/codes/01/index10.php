<?php

class AuthService
{
    public function attempt($username, $password)
    {
        // Logic

        if (true) {
            throw new Exception('Login failed', 1001);
        }

        if (true) {
            throw new Exception('Too many login attempts', 1002);
        }
    }
}

$auth = new AuthService();

try {
    $auth->attempt('alex', 'password');
} catch (Exception $e) {
    switch ($e->getCode()) {
        case 1001:
            var_dump($e->getMessage());
            break;
        case 1002:
            var_dump('Ban user IP');
            break;
    }
}
