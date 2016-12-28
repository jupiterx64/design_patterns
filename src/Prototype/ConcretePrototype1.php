<?php

namespace DP\Prototype;

class ConcretePrototype1 extends Prototype
{
    public function __construct() {
        echo 'Called original concrete prototype 1' . '<br>';
        $this->name = 'Original concrete prototype 1.';
    }

    public function __clone() {

    }
}
