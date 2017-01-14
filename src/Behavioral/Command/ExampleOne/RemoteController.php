<?php

namespace DP\Behavioral\Command\ExampleOne;

class RemoteController
{
    private $command;    

    public function setCommand(ICommand $command) {
        $this->command = $command;
    }

    public function executeCommand() {
        $this->command->execute();
    }
}
