<div align='center'>
<?php

try {

    include 'connection.php';
    $del = $dbh->prepare('DELETE FROM players WHERE id = :id');

    $del->execute(array(':id' => $_GET["deleteID"]));
    header('Refresh:0; url=index2.php?page=1');
    die();
} catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
}

?>