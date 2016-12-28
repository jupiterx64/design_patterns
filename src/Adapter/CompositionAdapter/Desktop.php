<?php

namespace DP\Adapter\CompositionAdapter;

// Implementing IFormat works perfectly fine for desktop, because horizontal layout is just what we need
//
// But for mobile? Not really, vertical layout should be used instead!
// So in order to keep the consistency and (class) types, create mobile interface which works for mobile version
// BUT, since mobile interface will not be matched desktop interface, we need to make adapter so these can be compatible
// and the adapter must implement "original" (IFormat) interface and adapt differences
// (usually, call all adapted interface functions from original's interface functions)
class Desktop implements IFormat
{
    public function formatCss() {
        echo 'Desktop version to format css...' . '<br>';
    }

    public function horizontalLayout() {
        echo 'Desktop version uses horizontal layout...' . '<br>';
    }
}
