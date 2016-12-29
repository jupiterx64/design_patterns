<?php

namespace DP\Behavioral\State\ExampleTwo\States;

use DP\Behavioral\State\ExampleTwo\Context;

class BrighterState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function turnLightOn() {
        echo 'Brighter cant go to on!' . '<br>';
    }

    public function turnLightOff() {
        echo 'Brighter cant go to off!' . '<br>';
    }

    public function turnBrighter() {
        echo 'Light already brighter!' . '<br>';
    }

    public function turnBrightest() {
        echo 'Brighter went to brightest!' . '<br>';
        $this->context->setState($this->context->getBrightestState());
    }
}
