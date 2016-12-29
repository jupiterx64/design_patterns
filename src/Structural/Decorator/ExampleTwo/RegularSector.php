<?php

namespace DP\Structural\Decorator\ExampleTwo;

class RegularSector extends BasicSector
{
    public function __construct() {
        $this->sector = 'Regular sector';
    }

    public function getSector() {
        return $this->sector;
    }

    public function getName() {
        return 'Regular';
    }
}
