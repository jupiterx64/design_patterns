<?php

namespace DP\Behavioral\Visitor\Wrap;

use DP\Behavioral\Visitor\Visitables\Bread;
use DP\Behavioral\Visitor\Visitables\Milk;

interface IWrapVisitor
{
    // holds options for objects, instance of IWrapVisitor will hold implemented logic
    public function wrapBread(Bread $bread);
    public function wrapMilk(Milk $milk);
}
