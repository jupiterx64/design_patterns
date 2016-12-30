<?php

namespace DP\Behavioral\Observer\Subjects;

use DP\Behavioral\Observer\Subject;

class CompanyA extends Subject
{
    // when company decides to change a price inform all of its customers about the change
    public function setPrice($price) {
        $this->price = $price;
        $this->notify();
    }

    public function getPrice() {
        return $this->price;
    }
}
