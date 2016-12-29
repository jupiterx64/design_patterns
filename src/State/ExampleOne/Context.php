<?php

namespace DP\State\ExampleOne;

use DP\State\ExampleOne\States\IState;
use DP\State\ExampleOne\States\OffState;
use DP\State\ExampleOne\States\OnState;

class Context
{
    private $offState;
    private $onState;
    private $currentState;

    public function __construct() {
        $this->offState = new OffState($this);
        $this->onState = new OnState($this);

        // Beginning|default stat is Off
        $this->currentState = $this->offState;
    }

    // Set the current state (class instance)
    public function setState(IState $state) {
        $this->currentState = $state;
    }

    // Method--Trigger
    // Call THE state method from whatever the current state is on
    public function turnOnLight() {
        $this->currentState->turnLightOn();
    }

    public function turnOffLight() {
        $this->currentState->turnLightOff();
    }

    // Getters for all available states (class instances)
    public function getOffState() {
        return $this->offState;
    }

    public function getOnState() {
        return $this->onState;
    }
}
