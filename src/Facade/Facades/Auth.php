<?php

namespace DP\Facade\Facades;

use DP\Facade\Auth\Login;
use DP\Facade\Auth\Registration;

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
