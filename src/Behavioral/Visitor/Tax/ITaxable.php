<?php

namespace DP\Behavioral\Visitor\Tax;

interface ITaxable
{
    public function processTaxing(IAddTaxVisitor $taxVisitor);
}
