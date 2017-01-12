<?php

namespace DP\Behavioral\Command\ExampleOne;

class LightOnCommand implements ICommand
{
    private $room;

    public function __construct(Room $room) {
        $this->room = $room;
    }

    public function execute() {
        $this->room->turnLightOn();
    }
}
