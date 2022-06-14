<!--//drink.php-->
<?php
require_once('Player.php');

class Midfielder extends Player {


    public function callMF() {
        echo "Mr. " . $this->name . " is MF player.";
        echo "<br>";
    }
}

?>