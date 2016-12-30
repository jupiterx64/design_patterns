<?php

namespace DP\Behavioral\ChainOfResponsibility;

abstract class Handler
{
    protected $request;
    protected $handler;

    abstract public function handle($request);
    abstract public function nextHandler($handler);
}
