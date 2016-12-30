<?php

namespace DP\Behavioral\ChainOfResponsibility\Handlers;

use DP\Behavioral\ChainOfResponsibility\Handler;

class H3 extends Handler
{
    public function __construct() {
        $this->request = 'H3';
    }

    public function nextHandler($handler) {
        $this->handler = $handler;
    }

    public function handle($request) {
        if ($this->request == $request->getRequest()) {
            echo 'Handled by ' . $this->request . '<br>';
        } elseif (!is_null($this->handler)) {
            $this->handler->handle($request);
        } else {
            echo 'No valid handler found.' . '<br>';
        }
    }
}
