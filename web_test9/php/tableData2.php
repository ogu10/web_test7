<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Trial</title>
    <link rel="icon" type="image/png" sizes="192x192" href="../images/android-chrome-192x192.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../css/styleSheet.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>

    <!-- Vendor CSS Files -->
    <!--    <link href="css/assets/vendor/aos/aos.css" rel="stylesheet">-->
    <link href="../css/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link href="css/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">-->
    <link href="../css/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../css/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../css/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

</head>

<?php
include 'connection.php';
$sortBy = isset($_GET["column"])? $_GET["column"] : "id";
$sortOrder = isset($_GET["sort"])? $_GET["sort"] : "DESC";
$searchName = isset($_GET["search_word"])? $_GET["search_word"] : '';
$searchTeam = isset($_GET["team_belongings"])? $_GET["team_belongings"] : [];
$elements = is_array($searchTeam)? count($searchTeam): '0';
$deleteID = isset($_GET["deleteID"])? $_GET["deleteID"]: '0000';
/*echo "<input type=hidden id='elementNumber' value='$elements'> ";*/

// GETで現在のページ数を取得する（未入力の場合は1を挿入）
if (isset($_GET['page'])) {$page = (int)$_GET['page'];} else {$page = 1;}
// スタートのポジションを計算する
if ($page > 1) {$start = ($page * 6) - 6;} else {$start = 0;}

$array = '';
$y = 1;
foreach ($searchTeam as $teams):
    $array .= "'".$teams."'";
    if($y < $elements){
        $array .= ", ";}
    $y ++;
endforeach;


$del = $dbh->prepare('DELETE FROM players WHERE id = :id');
$del->execute(array(':id' => $deleteID));
/*echo $deleteID;*/
if($array == ''){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' ORDER BY $sortBy $sortOrder, Length(team) LIMIT {$start}, 6";
}else{
    $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' AND `team` IN ($array) ORDER BY $sortBy $sortOrder, Length(team) LIMIT {$start}, 6";}
/*var_dump($query);*/

$result = 0;
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result_t = 0;
$teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
$result_t = $teams->fetchAll(PDO::FETCH_ASSOC);
$id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
?>

<?php include "header.php"; ?>

<section id="tables" class="tables section-bg">
    <div class="container col-lg-8" data-aos="fade-up">
        <br><br>
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Table</h2>
            <p>あなたのキャリアや才能をJoBinsで存分に発揮しませんか？<br>
                きちんと成果が評価される環境、人種も国籍も関係なく個人を尊重する組織文化、<br>
                よく働き、よく遊ぶ仕事仲間があなたを待っています！</p>
        </div>

<form name="form1" id="form1" action="delete.php" method="GET">
    <input type="hidden" name="deleteID" id="deleteID" value="<?php echo $deleteID ?>"></form>

<table id="players_list" class="players_list table table-striped">
    <th>No. <button class='button5' type="submit" onclick="sortFunction('No')"><i class="fa-solid fa-bars"></i></button>
    <th>name <button class='button5' type="submit" onclick="sortFunction('name')"><i class="fa-solid fa-bars"></i></button>
    <th>team <button class='button5' type="submit" onclick="sortFunction('Length(team)')"><i class="fa-solid fa-bars"></i></button>
    <th>update</th>
    <th>delete</th>
    </tr>
    　 <?php $x=1; foreach ($result as $value): ?>
    <tr>
        <td>
            　<?php echo $value['No'] ?></td>
        <td>
            　<?php echo $value['name'] ?>
            <?php
            if ($value["id"]== $id_max){echo "<font color='red'>"."new!"."</font>";} ?></td>
        <td>
            　<?php /*$team_list = isset($value['team'])? $value['team']: "-no data-";*/
            echo $value['team']; ?></td>
        <td>&nbsp;&nbsp;&nbsp;
            <?php echo "<!--<button class=`button3`>--><a href=../../edit.php?id=" . $value["id"] . ">"; ?>
            <i class="fa-solid fa-pen-nib"></i>
            <?php echo "</a>\n";
            echo "<td>";
            echo "<button class='button3' id='deleteButton' value='${value["id"]}' type= 'button' onclick='deleteFunc(this)'>";
            echo "<input type=hidden id='name${value["id"]}' value='${value["name"]}'> ";
            /*                echo $value["id"];*/?>
            <i class="fa-solid fa-trash"></i>
            <?php echo "</button>\n";
            echo "</tr>\n"; ?>
            <?php $x++ ?>
            <?php endforeach ?>
</table>
<div align="center">
    <?php
    // resultテーブルのデータ件数を取得する
    $page_num = $dbh->prepare("SELECT COUNT(*) id	FROM players");
    $page_num->execute();
    $page_num = $page_num->fetchColumn();
    // ページネーションの数を取得する
    $pagination = ceil($page_num / 6);
    ?>
    <a href="?page=1" class="<?php if($_GET['page'] == 1){echo "disabled";} ?>">
        <i class="fa-solid fa-angles-left"></i></a>
    <a href="?page=<?php if($_GET['page'] > 1){echo $_GET['page']-1;}else{echo 1;} ?>" class="<?php if($_GET['page'] == 1){echo "disabled";} ?>">
        <i class="fa-solid fa-angle-left"></i></a>&nbsp;
    <?php for ($x=1; $x <= $pagination ; $x++) { ?>
        <?php if($x == $_GET['page']){$key = 'active';}else{$key = '';} ?>
        <a href="?page=<?php echo $x ?>" class="<?php echo $key; ?>"><?php echo $x; ?></a>
    <?php } // End of for ?>&nbsp;
    <a href="?page=<?php if($_GET['page'] < $pagination){echo $_GET['page']+1;}else{echo $pagination;} ?>" class="<?php if($_GET['page'] == $pagination){echo "disabled";} ?>">
        <i class="fa-solid fa-angle-right"></i></a>
    <a href="?page=<?php echo $pagination; ?>" class="<?php if($_GET['page'] == $pagination){echo "disabled";} ?>">
        <i class="fa-solid fa-angles-right"></i></a>
</form>
        <br><br>
</div></section>

<style>
    .active{
        background-color: yellow;
    }
    a.disabled{
        pointer-events: none;
        color: dimgray;
    }
</style>

<script>
    //sort function
    function sortFunction(param){
        var oldSortColumn = "<?php echo $sortBy; ?>"
        if(oldSortColumn === param){
            if (document.getElementById("searchSort").value === "ASC")
            {var sort = "DESC";}
            else
            {var sort = "ASC";}}
        else {
            var sort = "ASC";}}


    //deleteing confirmation
    function deleteFunc(target){
        var target_value = target.value;
        var nameID = 'name' + target_value
        var name = document.getElementById(nameID).value;
        var answer = window.confirm('【Caution!】\nYou are deleting \"' + name + '\" !!!!');
        /*        alert('you clicked button-id: ' + target_value);*/
        if(answer){
            document.getElementById('deleteID').value = target_value;
            document.form1.submit();
        }
    }
</script>

<footer>
    <?php include "footer.php"; ?>
</footer>