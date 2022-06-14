<!--//drink.php-->
<?php
require_once('Player.php');

class Midfielder extends Player {
    private $assist;

    public function __construct($number, $name, $team, $nationality, $assist)  {
        parent::__construct($number, $name, $team, $nationality) ;
        $this->assist = $assist;
    }

    public function getAssist() {
        return $this->assist;
    }

    public function setType($goal) {
        $this->goal = $goal;
    }

    public function callMF() {
        echo "Mr. " . $this->name . " is MF player.";
        echo "<br>";
    }

}

?>