<?php

$errors = [];
$data = [];
$data['message'] = '';

if (empty($_POST['name2'])) {
    $errors['name2'] = 'Name is required.';
}

if (empty($_POST['no2'])) {
    $errors['no2'] = 'No is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
    header('location: errorMessage.php');
} else {
    $data['success'] = true;
    $data['message'] = 'サクセス！！';

    session_start();
    include 'connection.php';
    $No = ($_POST['no2']) ? $_POST['no2'] : "";//ユーザーから受け取った値を変数に入れる
    $name = ($_POST['name2']) ? $_POST['name2'] : "";//ユーザーから受け取った値を変数に入れる
    $team = ($_POST['team2']) ? $_POST['team2'] : "";//ユーザーから受け取った値を変数に入れる
    $checkQuery = $query =  "SELECT * FROM players WHERE `name` = '$name' ";
    $checkAction = $dbh->query($checkQuery);
    $checkResult = $checkAction->fetchAll(PDO::FETCH_ASSOC);
    if($checkResult) {
        $data['message'] = "もうあるよ！！";
        header('location: errorMessage.php');
    }else{
/*    $league_id = "1";
    $league_id = ($_POST['league_id2']) ? $_POST['league_id2'] : "1";//ユーザーから受け取った値を変数に入れる*/
    $stmt = $dbh->prepare("INSERT INTO players(No,name,team) VALUES(:No,:name,:team)");//登録準備
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt->bindValue(':team', $team, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt->bindValue(':No', $No, PDO::PARAM_STR);//登録する文字の型を固定
/*    $stmt->bindValue(':league_id', $league_id, PDO::PARAM_STR);//登録する文字の型を固定*/
    $stmt->execute();//データベースの登録を実行
    $dbh = NULL;//データベース接続を解除
    header('location: ../index.php');
}}

echo json_encode($data);


