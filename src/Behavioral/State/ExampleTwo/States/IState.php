<?php

namespace DP\Behavioral\State\ExampleTwo\States;

interface IState
{
    // can go to BRIGHTER only
    public function turnLightOn();
    // can go to ON only
    public function turnLightOff();
    // can go to BRIGHTEST only
    public function turnBrighter();
    // can go to OFF only
    public function turnBrightest();
}
