<!--//data.php-->
<?php
require_once('all.php');
require_once('mid.php');
require_once('FW.php');

$messi = new Forward('30', 'Messi', 'PSG', 'Argentina', 16);
$ronald = new Forward('7', 'Ronald', 'Manchester U', 'Portuguese', 30);
$salah = new Forward('10', 'Salah', 'Liverpool', 'Egypt', 31);
$modric= new Midfielder('10', 'Modric', 'Real Madrid', 'Croatia', 14);

$players = array($messi, $ronald, $salah, $modric);

?>
