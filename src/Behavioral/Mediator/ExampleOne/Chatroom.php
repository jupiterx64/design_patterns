<?php

namespace DP\Behavioral\Mediator\ExampleOne;

class Chatroom
{
    private $participants = [];

    // assign Participant to context/chatroom so the Participant can access it locally
    // and call chatroom's send($from, $to, $message) function through that local chatroom object
    public function register(Participant $participant) {
        array_push($this->participants, $participant);

        $participant->setChatroom($this);
    }

    public function send($from, $to, $message) {
        $receiver = new Participant($to);

        // not really good idea to find receive like this, hell it's just for demonstration
        foreach ($this->participants as $p) {
            if ($p->getName() == $to) {
                $receiver->receive($from, $message);
            }
        }
    }
}