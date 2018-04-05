<?php

class Fork extends Maze {
    private $left, $right;

    public function __construct($left, $right) {
        $this->left = $left;
        $this->right = $right;
    }

    protected function getDescription() {
        return "You've reached a fork. Please choose your direction.<br>
                <button type='button' onclick='left()'>Left</button>
                <button type='button' onclick='right()'>Right</button>";
    }

    public function left() {
        
    }

}

/*
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

    public function goRight() {
        return $this->right;
    }
}
*/
?>