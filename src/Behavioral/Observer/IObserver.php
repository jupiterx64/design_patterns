<?php

namespace DP\Behavioral\Observer;

interface IObserver
{
    public function update(Subject $subject);
}
