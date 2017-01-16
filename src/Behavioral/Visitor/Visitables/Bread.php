<?php

namespace DP\Behavioral\Visitor\Visitables;

use DP\Behavioral\Visitor\Tax\ITaxable;
use DP\Behavioral\Visitor\Tax\IAddTaxVisitor;
use DP\Behavioral\Visitor\Wrap\IWrappable;
use DP\Behavioral\Visitor\Wrap\IWrapVisitor;

class Bread implements ITaxable, IWrappable
{
    private $price;
    private $wrap;

    public function __construct() {
        $this->price = 20.00;
        $this->wrap = 'Not wrapped.';
    }

    // decouple taxing process, let IAddTaxVisitor deal with it
    public function processTaxing(IAddTaxVisitor $taxVisitor) {
        $taxVisitor->calculateTaxBread($this);
    }

    // decouple wrapping process, let IWrapVisitor deal with it
    public function wrap(IWrapVisitor $wrapVisitor) {
        $wrapVisitor->wrapBread($this);
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getWrap() {
        return $this->wrap;
    }

    public function setWrap($wrap) {
        $this->wrap = $wrap;
    }
}
