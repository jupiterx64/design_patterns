<?php

namespace DP\Behavioral\Command\ExampleTwo;

class Room
{
    // these functions are called by Commands in their execute() methods
    public function turnLightOn($source = null) {
        if (!is_null($source)) {
            echo 'UNDO: Turned LIGHT ON (command) in ROOM (receiver).' . '<br>';            
        } else {
            echo 'Turned LIGHT ON (command) in ROOM (receiver).' . '<br>';
        }
    }

    public function turnLightOff($source = null) {
        if (!is_null($source)) {
            echo 'UNDO: Turned LIGHT OFF (command) in ROOM (receiver).' . '<br>';
        } else {
            echo 'Turned LIGHT OFF (command) in ROOM (receiver).' . '<br>';
        }
    }
}
