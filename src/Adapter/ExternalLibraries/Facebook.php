<?php

namespace DP\Adapter\ExternalLibraries;

class Facebook
{
    // In the beginning it was called makePost
    public function makePost($msg) {
        echo 'Posting a message ' . $msg;
    }

    // ... BUT, then crazy facebook dude changed it to postChanged
    // So, now you need to adapt these changes all over your project?? HELL NO!
    // Change it in your FacebookAdapter ONLY!
    public function postChanged($msg) {
        echo 'Posting a message has changed. Posting message ' . $msg;
    }
}
