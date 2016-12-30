<?php

namespace DP\Behavioral\ChainOfResponsibility;

abstract class Handler
{
    protected $request;
    protected $handler;

    // $request = value to validate if the handler can handle it or pass it to the next handler
    abstract public function handle($request);
    abstract public function nextHandler(Handler $handler);
}
