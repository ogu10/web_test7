<?php
require_once('player.php');

class playerScore extends player
{
    public $speed;
    public $pass;
    public $shoot;

    public function __construct($id, $number, $name, $team, $speed, $pass, $shoot)
    {
        parent::__construct($id, $number, $name, $team);
        $this->speed = $speed;
        $this->pass = $pass;
        $this->shoot = $shoot;
    }
    public function getSpeed()
    {
        return $this->speed;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function getShoot()
    {
        return $this->shoot;
    }
}