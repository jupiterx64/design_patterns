<?php

namespace DP\Adapter\Adapters;

use DP\Adapter\ExternalLibraries\Facebook;

class FacebookAdapter
{
    private $facebook;

    public function __construct(Facebook $facebook) {
        $this->facebook = $facebook;
    }

    // All changes should be done here!
    // Everytime Facebook changes something, we just need to ADAPT it here!
    public function myPost($msg) {
        $this->facebook->postChanged($msg);
    }
}
