<?php

namespace DP\Behavioral\Command\ExampleOne;

class Room
{
    // these functions are called by Commands in their execute() methods
    public function turnLightOn() {
        echo 'Turned LIGHT ON (command) in ROOM (receiver).' . '<br>';
    }

    public function turnLightOff() {
        echo 'Turned LIGHT OFF (command) in ROOM (receiver).' . '<br>';
    }
}
