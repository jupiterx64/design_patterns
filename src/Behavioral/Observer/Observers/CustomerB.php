<?php

namespace DP\Behavioral\Observer\Observers;

use DP\Behavioral\Observer\IObserver;
use DP\Behavioral\Observer\Subject;

class CustomerB implements IObserver
{
    private $price;

    public function __construct() {
        $this->price = 10.99;
    }

    public function update(Subject $subject) {
        $this->price = $subject->getPrice();
    }

    public function getPrice() {
        return $this->price;
    }
}
