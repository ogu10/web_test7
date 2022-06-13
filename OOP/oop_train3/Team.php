<?php

class Team {
    public function __construct($nation, $city, $team) {
        $this->number = $nation;
        $this->name = $city;
        $this->team = $team;

    }

    public function getTeam() {
        return $this->team;
    }

}