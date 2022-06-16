<?php

class abilityScores
{
    protected $id;
    public $speed;
    public $pass;
    public $shoot;

    public function __construct($id, $speed, $pass, $shoot)
    {
        $this->id = $id;
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