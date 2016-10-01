<?php

namespace DP\Basic\Models;

// Models do not contain "hard" business logic, they are just MODELS
class Patient
{
    private $name;

    private $email;

    private $ssn;

    public function __construct() {
        //
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSSN($ssn) {
        $this->ssn = $ssn;
    }
}
