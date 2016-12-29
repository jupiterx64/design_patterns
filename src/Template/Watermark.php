<?php

namespace DP\Template;

abstract class Watermark
{
    protected $imgUrl;
    protected $text;

    public function createWatermark($imgUrl, $text) {
        $this->imgUrl = $imgUrl;
        $this->text = $text;

        $this->applyImage($this->imgUrl);
        $this->applyText($this->text);
    }

    abstract protected function applyImage($imgUrl);
    abstract protected function applyText($text);
}
