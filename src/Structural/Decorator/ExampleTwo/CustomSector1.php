<?php

namespace DP\Structural\Decorator\ExampleTwo;

class CustomSector1 extends SectorDecorator
{
    public function __construct(BasicSector $sector) {
        $this->sector = $sector;
    }

    public function getSector() {
        return $this->sector->getSector() . ' with customization';
    }

    public function getName() {
        return $this->sector->getName() . ' with customization';
    }
}
