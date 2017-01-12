<?php

namespace DP\Behavioral\Command\ExampleOne;

class Room
{
    public function turnLightOn() {
        echo 'Turned LIGHT ON (command) in ROOM (receiver).' . '<br>';
    }
}
