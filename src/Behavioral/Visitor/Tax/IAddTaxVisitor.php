<?php

namespace DP\Behavioral\Visitor\Tax;

use DP\Behavioral\Visitor\Visitables\Bread;
use DP\Behavioral\Visitor\Visitables\Milk;

interface IAddTaxVisitor
{
    public function calculateTaxBread(Bread $bread);
    public function calculateTaxMilk(Milk $milk);
}
