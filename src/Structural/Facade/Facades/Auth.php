<?php

namespace DP\Structural\Facade\Facades;

use DP\Structural\Facade\Auth\Login;
use DP\Structural\Facade\Auth\Registration;

class Auth
{
    public static function register() {
        $registration = new Registration;

        $registration->registerFirstStep();
        $registration->additionalStepRequired();
        $registration->finalStepRequired();
    }

    public static function login() {
        (new Login)->login();
    }

    public static function logout() {
        (new Login)->logout();
    }
}
