<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
include '../connection.php';

echo $_SESSION['name'];
$No = ($_SESSION['no'])? $_SESSION['no']:"8888";//ユーザーから受け取った値を変数に入れる
$name = ($_SESSION['name'])? $_SESSION['name']:"???";//ユーザーから受け取った値を変数に入れる
$team = ($_SESSION['team'])? $_SESSION['team'] :"?????";//ユーザーから受け取った値を変数に入れる
$league_id = "1";
$league_id = ($_SESSION['league_id'])? $_SESSION['league_id']:"1";//ユーザーから受け取った値を変数に入れる
$checkQuery = $query =  "SELECT * FROM players WHERE `name` = '$name' ";
$checkAction = $dbh->query($checkQuery);
$checkResult = $checkAction->fetchAll(PDO::FETCH_ASSOC);
/*print_r($checkResult);
$_SESSION['message'] = "ダメでした";*/

    $stmt = $dbh->prepare("INSERT INTO players(No,name,team,league_id) VALUES(:No,:name,:team,:league_id)");//登録準備
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt->bindValue(':team', $team, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt->bindValue(':No', $No, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt->bindValue(':league_id', $league_id, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt->execute();//データベースの登録を実行
    $dbh = NULL;//データベース接続を解除
    /*echo "new one";*/
    $_SESSION['message'] = "success";
    /*header('location: ../home.php#tables');*/

?>

<div align='center'>
    <body background="images/1_3.jpg">
    <body id="log_body">
    <main class="main_log">
        <h2>
            <p>Thank you for your Answer!<br>
            <h1>
                <br>your hero is... <font color='red'><?php echo $name; ?></font></p>
            </h1>
        </h2>


    </body>
    <br>
    <p>
        <a href="../submit.php">go back to index</a><br><br>
        <a href="test7/test8.php">go to answer list!</a>
    </p>
