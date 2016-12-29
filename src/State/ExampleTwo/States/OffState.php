<?php

namespace DP\State\ExampleTwo\States;

use DP\State\ExampleTwo\Context;

class OffState implements IState
{
    private $context;

    public function __construct(Context $context) {
        $this->context = $context;
    }

    public function turnLightOn() {
        echo 'Off went to on!' . '<br>';
        $this->context->setState($this->context->getOnState());
    }

    public function turnLightOff() {
        echo 'Light already off!' . '<br>';
    }

    public function turnBrighter() {
        echo 'Off cant go to brighter!' . '<br>';
    }

    public function turnBrightest() {
        echo 'Off cant go to brightest!' . '<br>';
    }
}
