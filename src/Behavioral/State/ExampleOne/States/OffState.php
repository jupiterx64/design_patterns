<?php

namespace DP\Behavioral\State\ExampleOne\States;

use DP\Behavioral\State\ExampleOne\Context;

class OffState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    // Because we are in OffState, we can go to OffState instance
    // And since Context is main worker class, we need to set this new state for the context
    public function turnLightOn() {
        echo 'Light on!' . '<br>';
        $this->context->setState($this->context->getOnState());
    }


    // We are already in OffState! Thats why we cant turn light off again
    public function turnLightOff() {
        echo 'Light already off!' . '<br>';
    }
}
