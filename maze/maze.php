<?php

session_start();

abstract class Maze {

    abstract protected function getDescription();

    public function description() {
        print "<p>" . $this->getDescription() . "</p>";
    }
}

class Enemy extends Maze {
    protected function getDescription() {
        return 'You found the exit! Hooray!!! Well, there\'s an enemy called Exam right in front of you, and he killed you.<br /><h2>Game Over...</h2><br />Would you like to start over?<br /><button type=\'button\' onclick="call(\'start\')">Start Over</button>';
    }
}

class Fork extends Maze {
    private $left, $right;

    public function __construct($left, $right) {
        $this->left = $left;
        $this->right = $right;
    }

    protected function getDescription() {
        return 'You\'ve found a fork, now which way do you go???<br />
                <button type=\'button\' onclick="call(\'left\')">Left</button>
                <button type=\'button\' onclick="call(\'right\')">Right</button>';
    }

    public function goLeft() {
        $this->left->description();
        $_SESSION['maze'] = $this->left;
    }

    public function goRight() {
        $this->right->description();
        $_SESSION['maze'] = $this->right;
    }
}

class Hallway extends Maze {
    private $hall;

    public function __construct($hall) {
        $this->hall = $hall;
    }

    protected function getDescription() {
        return 'You\'ve entered a hallway, click the button below to continue onwards into the abyss...<br /><button type=\'button\' onclick="call(\'continue\')">Continue</button>';
    }

    public function goAhead() {
        $this->hall->description();
        $_SESSION['maze'] = $this->hall;
    }
}

class DeadEnd extends Maze {
    protected function getDescription() {
        return 'You got stuck in this place because you just found a DEAD END!!!<br />Would you like to start over?
        <br /><button type=\'button\' onclick="call(\'start\')">Start Over</button>';
    }
}

class Exits extends Maze {
    protected function getDescription() {
        return 'Hey, not bad, you actually finished this maze! Good job!<br />Would you like to start over?
        <br /><button type=\'button\' onclick="call(\'start\')">Start Over</button>';
    }
}

class Entrance extends Maze {
    private $maz;

    public function __construct($maz) {
        $this->maz = $maz;
    }

    protected function getDescription() {
        return 'Welcome to a new maze. If you find the exit without getting killed, you\'ll be crowned Prince of Egypt!
                <br /><button type=\'button\' onclick="call(\'begin\')">Start</button>';
    }

    public function play() {
        $this->maz->description();
        $_SESSION['maze'] = $this->maz;
    }
}

$q = isset($_REQUEST['q']) ? $_REQUEST['q'] : null;
$maze = $_SESSION['maze'];

if ($q === "start") {
    $maze = new Entrance(new Hallway(new Fork(new Fork(new Hallway(new DeadEnd), new Enemy()), new Exits)));
    $_SESSION['maze'] = $maze;
    $maze->description();
}
elseif ($q === "begin") {
    $maze->play();
}
elseif ($q === "continue") {
    $maze->goAhead();

}
elseif ($q === "left") {
    $maze->goLeft();

}
elseif ($q === "right") {
    $maze->goRight();
}

?>