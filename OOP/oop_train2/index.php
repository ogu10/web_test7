<!--index.php-->
<?php
require_once('playersData.php');
require_once('all.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
    <meta charset="utf-8">
    <title>Players List with OOP</title>
</head>
<body>
<div class="menu-wrapper container">
    <h1 class="logo">Players List with OOP</h1>
    <h3>We have <font color="red"><?php echo Player::getCount() ?></font> players!</h3>
    <form method="post" action="confirm.php">
        <div class="menu-items">
            <?php foreach ($players as $player): ?>
                <div class="menu-item">
                    <h3 class="menu-item-name"><?php echo $player->getNumber() ?></h3>
                    <h3 class="menu-item-name"><?php echo $player->getName() ?></h3>
                    <h3 class="menu-item-name"><?php echo $player->getTeam() ?></h3>
                    <?php if ($player instanceof Midfielder): ?>
                        <p class="menu-item-type"><?php echo $player->getType() ?></p>
                    <?php else: ?>
<!--                        <?php /*for($i=0;$i<$player->getSpiciness();$i++):*/?>
                        --><?php /*endfor */?>
                    <?php endif ?>
<!--                    <p class="price">¥<?php /*echo $player->getTaxIncludedPrice() */?>（税込）</p>-->
<!--                    <input type="text" value="0" name="<?php /*echo $player->getName() */?>">
                    <span>個</span>-->
                </div>
            <?php endforeach ?>
        </div>
    </form>
</div>
</body>
</html>