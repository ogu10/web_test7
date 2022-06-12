<!--//drink.php-->
<?php
require_once('common.php');

class Midfielder extends Player {
    private $assist;

    public function __construct($number, $name, $team, $nationality, $assist)  {
        parent::__construct($number, $name, $team, $nationality) ;
        $this->assist = $assist;
    }

    public function getAssist() {
        return $this->assist;
    }

    public function setType($assist) {
        $this->assist = $assist;
    }

}

?>