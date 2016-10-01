<?php

namespace DP\Facade\Auth;

class Registration
{
    public function registerFirstStep() {
        echo 'Registering...';
    }

    public function additionalStepRequired() {
        echo 'Doing some extra work...';
    }

    public function finalStepRequired() {
        echo 'Finally registered...';
    }
}
