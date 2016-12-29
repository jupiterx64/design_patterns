<?php

namespace DP\Behavioral\State\ExampleOne\States;

use DP\Behavioral\State\ExampleOne\Context;

class OnState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    // We are already in OnState! Thats why we cant turn light on again
    public function turnLightOn() {
        echo 'Light already on!' . '<br>';
    }

    // Because we are in OnState, we can go to OffState instance
    // And since Context is main worker class, we need to set new state for the context
    public function turnLightOff() {
        echo 'Light off!' . '<br>';
        $this->context->setState($this->context->getOffState());
    }
}
