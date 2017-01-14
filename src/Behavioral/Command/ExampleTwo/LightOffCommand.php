<?php

namespace DP\Behavioral\Command\ExampleTwo;

class LightOffCommand implements ICommand
{
    private $room;

    public function __construct(Room $room) {
        $this->room = $room;
    }

    public function execute() {
        $this->room->turnLightOff();
    }

    public function undo() {
        $this->room->turnLightOn('undo');
    }
}
