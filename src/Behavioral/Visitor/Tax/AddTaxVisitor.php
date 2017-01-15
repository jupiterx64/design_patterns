<?php

namespace DP\Behavioral\Visitor\Tax;

use DP\Behavioral\Visitor\Visitables\Bread;
use DP\Behavioral\Visitor\Visitables\Milk;

class AddTaxVisitor implements IAddTaxVisitor
{
    // logic to process taxing for bread
    // NOTE: php does not support polymorphic functions in interfaces
    public function calculateTaxBread(Bread $bread) {
        $bread->setPrice($bread->getPrice() + 10);
    }

    // logic to process taxing for milk
    // NOTE: php does not support polymorphic functions in interfaces
    public function calculateTaxMilk(Milk $milk) {
        $milk->setPrice($milk->getPrice() + 10);
    }
}
