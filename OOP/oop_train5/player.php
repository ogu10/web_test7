<?php
require_once('score.php');

class player {
    protected $id;
    public $number;
    public $name;
    public $team;
    public score $speed;

    public function __construct($id, $number, $name, $team, score $speed) {
        $this->id = $id;
        $this->number = $number;
        $this->name = $name;
        $this->team = $team;
        $this->speed = $speed;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTeam()
    {
        return $this->team;
    }


}