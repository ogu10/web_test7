<?php

class Player
{
    public $number;
    public $name;
    protected $team;
    private $nationality;
    private $assist;
    protected static $count = 0;

    public function __construct($number, $name, $team, $nationality)
    {
        $this->number = $number;
        $this->name = $name;
        $this->team = $team;
        $this->nationality = $nationality;

        self::$count++;
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


    public static function getCount()
    {
        return self::$count;
    }


    public function getAssist()
    {
        return $this->assist;
    }

    /**
     * @param mixed $assist
     */
    public function setAssist($assist): void
    {
        $this->assist = $assist;
    }




}