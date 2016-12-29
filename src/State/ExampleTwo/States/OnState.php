<?php

namespace DP\State\ExampleTwo\States;

use DP\State\ExampleTwo\Context;

class OnState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function turnLightOn() {
        echo 'Light already on!' . '<br>';
    }

    public function turnLightOff() {
        echo 'On cant go to off!' . '<br>';
    }

    public function turnBrighter() {
        echo 'On went to brighter!' . '<br>';
        $this->context->setState($this->context->getBrighterState());
    }

    public function turnBrightest() {
        echo 'On Cant go to brightest!' . '<br>';
    }
}
