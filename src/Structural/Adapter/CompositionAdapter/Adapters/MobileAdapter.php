<?php

namespace DP\Structural\Adapter\CompositionAdapter\Adapters;

use DP\Structural\Adapter\CompositionAdapter\IFormat;

// since this is composition, we will pass IMobileFormat in the constructor and use its instance to call adapted functions
class MobileAdapter implements IFormat
{
    private $mobile;

    public function __construct(IMobileFormat $mobile) {
        $this->mobile = $mobile;
    }

    public function formatCss() {
        $this->mobile->formatCss();
    }

    // Adapted function!!
    public function horizontalLayout() {
        $this->mobile->verticalLayout();
    }
}
