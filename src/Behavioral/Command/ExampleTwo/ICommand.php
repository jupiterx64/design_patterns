<?php

namespace DP\Behavioral\Command\ExampleTwo;

interface ICommand
{
    public function execute();
    public function undo();
}
