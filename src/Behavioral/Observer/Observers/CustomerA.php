<?php

namespace DP\Behavioral\Observer\Observers;

use DP\Behavioral\Observer\IObserver;
use DP\Behavioral\Observer\Subject;

class CustomerA implements IObserver
{
    private $Id;
    private $price;

    public function __construct() {
        $this->Id = 1;
        $this->price = 15.99;
    }

    public function update(Subject $subject) {
        $this->price = $subject->getPrice();
        // or we can automatically attach this observer to subject
        // $subject->attach($this);
    }

    public function getPrice() {
        return $this->price;
    }

    public function getId() {
        return $this->Id;
    }
}
