<?php

namespace DP\Basic\Models;

// Models do not contain "hard" business logic, they are just MODELS
class User
{
    private $first_name;

    private $last_name;

    public function __construct() {
        //
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }
}
