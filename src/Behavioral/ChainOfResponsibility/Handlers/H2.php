<?php

namespace DP\Behavioral\ChainOfResponsibility\Handlers;

use DP\Behavioral\ChainOfResponsibility\Handler;

class H2 extends Handler
{
    public function __construct() {
        $this->request = 'H2';
    }

    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function handle($request) {
        if ($this->request == $request->getRequest()) {
            echo 'Handled by ' . $this->request . '<br>';
        } elseif (!is_null($this->handler)) {
            $this->handler->handle($request);
        }
    }
}
