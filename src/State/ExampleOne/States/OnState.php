<?php

namespace DP\State\ExampleOne\States;

use DP\State\ExampleOne\Context;

class OnState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    // We are already in OnState! Thats why we cant turn light on again
    public function turnLightOn() {
        echo 'Lights already on!' . '<br>';
    }

    // Because we are in OnState, we can go to OffState instance
    // And since Context is main worker class, we need to set new state for the context
    public function turnLightOff() {
        echo 'Lights off!' . '<br>';
        $this->context->setState($this->context->getOffState());
    }
}
