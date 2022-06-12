<!--//drink.php-->
<?php
require_once('common.php');

class Forward extends Player {
    private $goal;

    public function __construct($number, $name, $team, $nationality, $goal)  {
        parent::__construct($number, $name, $team, $nationality) ;
        $this->goal = $goal;
    }

    public function getGoal() {
        return $this->goal;
    }

    public function setType($goal) {
        $this->goal = $goal;
    }

}

?>