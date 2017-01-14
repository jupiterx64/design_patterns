<?php

namespace DP\Behavioral\Command\ExampleTwo;

class RemoteController
{
    private $command;
    private $lastCommand;

    public function setCommand(ICommand $command) {
        $this->command = $command;
    }

    public function executeCommand() {
        $this->command->execute();
        $this->lastCommand = $this->command;
    }

    public function undoCommand() {
        $this->lastCommand->undo();
    }
}
