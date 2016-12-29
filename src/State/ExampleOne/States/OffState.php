<?php

namespace DP\State\ExampleOne\States;

use DP\State\ExampleOne\Context;

class OffState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    // Because we are in OffState, we can go to OffState instance
    // And since Context is main worker class, we need to set this new state for the context
    public function turnLightOn() {
        echo 'Lights on!' . '<br>';
        $this->context->setState($this->context->getOnState());
    }


    // We are already in OffState! Thats why we cant turn light off again
    public function turnLightOff() {
        echo 'Lights already off!' . '<br>';
    }
}
