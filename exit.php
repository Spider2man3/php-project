<?php

class Embark {
    public $exitName;
    public $exitDescription;

    public function __construct($exitName, $exitDescription = '') {
        $this->exitName = $exitName;
        $this->exitDescription = $exitDescription;
    }
}
?>