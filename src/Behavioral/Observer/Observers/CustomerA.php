<?php

namespace DP\Behavioral\Observer\Observers;

use DP\Behavioral\Observer\IObserver;
use DP\Behavioral\Observer\Subject;

class CustomerA implements IObserver
{
    private $price;

    public function __construct() {
        $this->price = 15.99;
    }

    public function update(Subject $subject) {
        $this->price = $subject->getPrice();
    }

    public function getPrice() {
        return $this->price;
    }
}
