<?php

namespace DP\Basic;

use DP\Basic\ConcreteClasses\Audi;
use DP\Basic\ConcreteClasses\BMW;
use DP\Basic\Interfaces\CarInterface;

class Driver
{
    private $car;

    #### WRONG APPROACH ####
    // public function __construct(Audi $car) {
    //     $this->car = $car;
    // }

    // public function __construct(BMW $car) {
    //     $this->car = $car;
    // }
    #### END OF WRONG APPROACH ####

    // The correct way to inject dependency
    public function __construct(CarInterface $car) {
        $this->car = $car;
    }

    // The correct way to call injected object's function
    // We KNOW the function $this->car->drive() exists because we passed object/class compatible with CarInterface 
    public function drive() {
        $this->car->drive();
    }
}
