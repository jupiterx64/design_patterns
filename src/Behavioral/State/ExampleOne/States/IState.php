<?php

namespace DP\Behavioral\State\ExampleOne\States;

interface IState
{
    // can go to OFF only
    public function turnLightOn();
    // can go to ON only
    public function turnLightOff();
}
