<?php

namespace DP\Behavioral\State\ExampleTwo\States;

use DP\Behavioral\State\ExampleTwo\Context;

class BrightestState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function turnLightOn() {
        echo 'Brightest cant go to on!' . '<br>';
    }

    public function turnLightOff() {
        echo 'Brightest went to off!' . '<br>';
        $this->context->setState($this->context->getOffState());
    }

    public function turnBrighter() {
        echo 'Brightest cant go to brighter!' . '<br>';
    }

    public function turnBrightest() {
        echo 'Light already brightest!' . '<br>';
    }
}
