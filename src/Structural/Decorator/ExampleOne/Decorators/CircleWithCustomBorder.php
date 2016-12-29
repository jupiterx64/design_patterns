<?php

namespace DP\Structural\Decorator\ExampleOne\Decorators;

use DP\Structural\Decorator\ExampleOne\Shapes\Circle;

// The special version of object/class Circle
class CircleWithCustomBorder
{
    private $circle;

    public function __construct(Circle $circle) {
        $this->circle = $circle;
    }

    public function draw() {
        // call original method draw() from DP\Structural\Decorator\Shapes\Circle if you want
        $this->circle->draw();

        echo 'Drawing border now...';
        echo 'Do some extra work too...';
    }

    public function addNewOptionsToo() {
        echo 'New option added special to this object/class only...';
    }
}
