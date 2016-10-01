<?php

namespace DP\Facade\Auth;

class Login
{
    public function login() {
        echo 'Logging in...';
    }

    public function logout() {
        echo 'Logging out...';
    }

    public function set_session() {
        echo 'Setting session...';
    }
}
