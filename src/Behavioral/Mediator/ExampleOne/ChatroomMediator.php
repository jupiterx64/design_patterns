<?php

namespace DP\Behavioral\Mediator\ExampleOne;

abstract class ChatroomMediator
{
    abstract public function register(Participant $participant);
    abstract public function send($from, $to, $message);
}