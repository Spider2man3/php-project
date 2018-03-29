<?php

class Maze {

    private $description;

    public function __construct($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }
}

?>