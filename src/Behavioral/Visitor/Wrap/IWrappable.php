<?php

namespace DP\Behavioral\Visitor\Wrap;

interface IWrappable
{
    // set objecct to be wrappable, but let visitor do the logic part!
    // define WHAT can be done to an object, but it's done using Visitor, there is no logic in the object itself
    public function wrap(IWrapVisitor $wrapVisitor);
}
