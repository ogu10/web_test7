<?php

class Team {

    public $nation;
    public $city;
    public $team;

    public function __construct($nation, $city, $team) {
        $this->nation = $nation;
        $this->city = $city;
        $this->team = $team;
    }

    public function getTeam() {
        return $this->team;
    }

}