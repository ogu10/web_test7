<?php

class Fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

Class Strawberry extends Fruit {
    public function message(){
        echo "Am i berry? ";
    }
}

$strawberry = new Strawberry("straw", "red");
$strawberry->message();
$strawberry->intro();
