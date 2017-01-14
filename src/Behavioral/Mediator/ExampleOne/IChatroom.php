<?php

namespace DP\Behavioral\Mediator\ExampleOne;

interface IChatroom
{
    public function register(Participant $participant);
    public function send($from, $to, $message);
}
