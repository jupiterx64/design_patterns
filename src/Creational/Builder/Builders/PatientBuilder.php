<?php

namespace DP\Creational\Builder\Builders;

use DP\Basic\Models\Patient;

class PatientBuilder
{
    private $patient;

    public function __construct() {
        $this->patient = new Patient;
    }

    public function build(array $data) {
        $this->patient->setName('semir mahovkic');
        $this->patient->setEmail('s.m@gmail.com');
        //$this->patient->doSomeExtraWorkBeforeSSN();
        // do some extra stuff...
        // prepareArchive();
        // haveADinner();
        // doThis();
        // doThat();
        $this->patient->setSSN('123123');

        return $this->patient;
    }
}
