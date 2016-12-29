<?php

namespace DP\Structural\Adapter\CompositionAdapter\Adapters;

class Mobile implements IMobileFormat
{
    public function formatCss() {
        echo 'Mobile version to format css...' . '<br>';
    }

    public function verticalLayout() {
        echo 'Mobile version uses vertical layout...' . '<br>';
    }
}
