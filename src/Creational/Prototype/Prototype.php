<?php

namespace DP\Creational\Prototype;

abstract class Prototype
{
    public $name;

    public function displayName() {
        echo $this->name . '<br>';
    }

    abstract public function __clone();
}
