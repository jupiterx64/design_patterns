<?php

namespace DP\Structural\Decorator\ExampleTwo;

abstract class BasicSector
{
    protected $sector;

    abstract public function getSector();
    abstract public function getName();
}
