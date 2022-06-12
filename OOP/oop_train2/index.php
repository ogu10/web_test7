<!--index.php-->
<?php
require_once('playersData.php');
require_once('sazn_work.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Players</title>
</head>
<body>
<div class="menu-wrapper container">
    <h1 class="logo">Players</h1>
    <h3>We have <font color="red"><?php echo Player::getCount() ?></font> players!</h3>
    <form method="post" action="confirm.php">
        <div class="menu-items">
            <?php foreach ($players as $player): ?>
                <div class="menu-item">
                    <h3 class="menu-item-name"><?php echo $player->getNumber() ?></h3>
                    <h3 class="menu-item-name"><?php echo $player->getName() ?></h3>
                    <h3 class="menu-item-name"><?php echo $player->getTeam() ?></h3>
                    <?php if ($player instanceof Drink): ?>
                        <p class="menu-item-type"><?php echo $player->getType() ?></p>
                    <?php else: ?>
                        <?php for($i=0;$i<$player->getSpiciness();$i++):?>
                        <?php endfor ?>
                    <?php endif ?>
                    <p class="price">¥<?php echo $player->getTaxIncludedPrice() ?>（税込）</p>
                    <input type="text" value="0" name="<?php echo $player->getName() ?>">
                    <span>個</span>
                </div>
            <?php endforeach ?>
        </div>
    </form>
</div>
</body>
</html>