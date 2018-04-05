<?php

abstract class Maze {

    abstract protected function getDescription();

    public function description() {
        print "<p>" . $this->getDescription() . "</p>";
    }
}

class Enemy extends Maze {
    protected function getDescription() {
        return "You found the exit! Hooray!!! Well, there's an enemy called Exam right in front of you, and he killed you.<br /><h2>Game Over...</h2>";
    }
}

class Fork extends Maze {
    private $left, $right;

    public function __construct($left, $right) {
        $this->left = $left;
        $this->right = $right;
    }

    protected function getDescription() {
        return "You've found a fork, now which way do you go???";
    }

    public function goLeft() {
        $this->left->description();
    }

    public function goRight() {
        $this->right->description();
    }
}

class Hallway extends Maze {
    private $hall;

    public function __construct($hall) {
        $this->hall = $hall;
    }

    protected function getDescription() {
        return "You've entered a hallway...";
    }

    public function goAhead() {
        $this->left->description();
    }
}

class DeadEnd extends Maze {
    protected function getDescription() {
        return "You got stuck in this place because you just found a DEAD END!!!";
    }
}

class Exits extends Maze {
    protected function getDescription() {
        return "Hey, not bad, you actually finished this maze! Good job!";
    }
}

class Entrance extends Maze {
    private $maz;

    public function __construct($maze) {
        $this->maz = $maze;
    }

    protected function getDescription() {
        return "Welcome to a new maze. If you find the exit without getting killed, you'll be crowned Prince of Egypt!
                <br /><button type='button' onclick='call(\'begin\')'>Start</button>";
    }

    public function play() {
        $this->maz->description();
    }
}

$q = isset($_REQUEST['q']) ? $_REQUEST['q'] : null;

if ($q === "start") {
    $maze = new Entrance(new Exits);
    $maze->description();
}
elseif ($q === "begin") {

}
/*
elseif ($q === "yes") {

}
elseif ($q === "no") {

}
elseif ($q === "left") {

}
elseif ($q === "right") {

}*/

?>