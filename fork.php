<?php
class Fork {
    public $left;
    public $right;

    public function __construct($left, $right) {
        $this->left = $left;
        $this->right = $right;
    }

    public function goLeft() {
        return $this->left;
    }

    public funtion goRight() {
        return $this->right;
    }
}