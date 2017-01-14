<?php

namespace DP\Behavioral\Command\ExampleTwo;

class LightOnCommand implements ICommand
{
    private $room;

    public function __construct(Room $room) {
        $this->room = $room;
    }

    public function execute() {
        $this->room->turnLightOn();
    }

    public function undo() {
        $this->room->turnLightOff('undo');
    }
}
