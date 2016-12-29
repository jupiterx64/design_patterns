<?php

namespace DP\Behavioral\Template;

class SpecificImplWatermark extends Watermark
{
    protected function applyImage($imgUrl) {
        echo 'Applying img <' . $imgUrl . '> first...' . '<br>';
    }

    protected function applyText($text) {
        echo 'Now applying text <' . $text . '> as the second step...' . '<br>';
    }
}
