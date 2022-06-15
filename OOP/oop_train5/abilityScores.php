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

}