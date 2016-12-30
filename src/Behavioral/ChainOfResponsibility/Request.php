<?php

namespace DP\Behavioral\ChainOfResponsibility;

class Request
{
    private $request;

    public function __construct($request) {
        $this->request = $request;
    }

    public function getRequest() {
        return $this->request;
    }
}
