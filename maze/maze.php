<?php

abstract class Maze {

    abstract protected function getDescription();

    public function description() {
        print "<p>" . $this->getDescription . "</p>";
    }
}

class Enemy extends Maze {
    protected function getDescription() {
        return "You found the exit! Hooray!!! Well, there's an enemy called Exam right in front of you, and he killed you.<br /><h2>Game Over...</h2>";
    }
}

class Fork extends Maze {
    protected function getDescription() {
        return "You've found a fork, now which way do you go???";
    }
}

class Hallway extends Maze {
    protected function getDescription() {
        return "You've entered a hallway...";
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
    protected function getDescription() {
        return "Welcome to a new maze. If you find the exit without getting killed, you'll be crowned Prince of Egypt!";
    }
}

$q = $_REQUEST["q"];

if ($q === "start") {
    $maze = new Entrance;
    $maze->getDescription();
}
/*
elseif ($q == "yes") {

}
elseif ($q == "no") {

}
elseif ($q == "left") {

}
elseif ($q == "right") {

}*/

?>