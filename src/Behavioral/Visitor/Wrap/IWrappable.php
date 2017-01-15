<?php

namespace DP\Behavioral\Visitor\Wrap;

interface IWrappable
{
    public function wrap(IWrapVisitor $wrapVisitor);
}
