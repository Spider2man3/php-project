<?php

class Enemy {
    public $enemyName;
    public $health;
    public $strength;
    
    public function __construct($enemyName, $health = 100, $strength = 100) {
        $this->enemyName = $eneryName;
        $this->health = $health;
        $this->strength = $strength;
    }
    
    public function greet() {
        echo 'Greet';
        return 'Hello, my name is {$this->enemyName}. I will kill you with my {$this->strength} power and {$this->health} health.';
    }
    
    public function attack($attack) {
        if ($this->health = 0) {
            return 'I am dead!';
        }
        else {
            $this->health -= $attack;
        }
    }
}