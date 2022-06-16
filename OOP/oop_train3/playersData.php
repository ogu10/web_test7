<!--//data.php-->
<?php
require_once('Player.php');
require_once('Forward.php');
require_once('Midfielder.php');
require_once('Sajan.php');
/*require_once ('Team.php');*/

/*$manU = new Team("UK","Manchester","Manchester United");*/
$messi = new Forward('30', 'Messi', 'PSG', 'Argentina', 16);
$ronald = new Forward('7', 'Ronald', 'manU', 'Portuguese', 30);
$salah = new Forward('10', 'Salah', 'Liverpool', 'Egypt', 31);
$modric= new Midfielder('10', 'Modric', 'Real Madrid', 'Croatia', 14);
$barella = new Midfielder('23', 'Barella', 'Inter', 'Italy', 13);
$benzema = new Forward('9', 'Benzema', 'Real', 'France', 30);

$players = array($messi, $ronald, $salah, $modric, $barella);

?>
