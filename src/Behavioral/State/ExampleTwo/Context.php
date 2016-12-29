<?php

namespace DP\Behavioral\State\ExampleTwo;

use DP\Behavioral\State\ExampleTwo\States\IState;
use DP\Behavioral\State\ExampleTwo\States\OffState;
use DP\Behavioral\State\ExampleTwo\States\OnState;
use DP\Behavioral\State\ExampleTwo\States\BrighterState;
use DP\Behavioral\State\ExampleTwo\States\BrightestState;

class Context
{
    private $offState;
    private $onState;
    private $brighterState;
    private $brightestState;
    private $currentState;

    public function __construct() {
        $this->offState = new OffState($this);
        $this->onState = new OnState($this);
        $this->brighterState = new BrighterState($this);
        $this->brightestState = new BrightestState($this);

        $this->currentState = $this->offState;
    }

    public function setState(IState $state) {
        $this->currentState = $state;
    }

    public function turnOnLight() {
        $this->currentState->turnLightOn();
    }

    public function turnOffLight() {
        $this->currentState->turnLightOff();
    }

    public function turnBrighter() {
        $this->currentState->turnBrighter();
    }

    public function turnBrightest() {
        $this->currentState->turnBrightest();
    }

    public function getOffState() {
        return $this->offState;
    }

    public function getOnState() {
        return $this->onState;
    }

    public function getBrighterState() {
        return $this->brighterState;
    }

    public function getBrightestState() {
        return $this->brightestState;
    }
}
