<?php

namespace DP\Behavioral\Mediator\ExampleOne;

interface IParticipant
{
    public function setChatroom(IChatroom $chatroom);
    public function send($to, $message);
    public function receive($from, $message);
    public function getName();
}
