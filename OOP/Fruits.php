<?php

class Fruits
{

    public $name;
    public $color;

    /**
     * @param $name
     * @param $color
     */
    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    function __destruct()
    {
        echo "This fruit is {$this->name} and the color is {$this->color}.";
        echo "\n";
        echo "\n";

    }



}


$apple = new Fruits("Orange","orange");
$apple = new Fruits("Apple","");
