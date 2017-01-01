<?php

namespace DP\Behavioral\Mediator\ExampleOne;

class Participant
{
    private $name;
    private $chatroom;

    public function __construct($name) {
        $this->name = $name;
    }

    public function setChatroom(Chatroom $chatroom) {
        $this->chatroom = $chatroom;
    }

    // NO direct call of receive function from here, like $p = new Participant($to);
    // let chatroom decide who is the receiver
    public function send($to, $message) {
        $this->chatroom->send($this->name, $to, $message);
    }

    public function receive($from, $message) {
        echo 'Received message from ' . $from . ': ' . $message . '<br>';
    }

    public function getName() {
        return $this->name;
    }
}