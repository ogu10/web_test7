<head>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    <link href="../css/buttonMaster.css" rel="stylesheet">
</head>


<?php
session_start();
include 'connection.php';
$sortBy = isset($_GET["column"])? $_GET["column"] : "id";
$sortOrder = isset($_GET["sort"])? $_GET["sort"] : "DESC";
$searchN0 = isset($_GET["no2"])? $_GET["no2"] : '';
$searchName = isset($_GET["name2"])? $_GET["name2"] : '';
$searchTeam = isset($_GET["team2"])? $_GET["team2"] : '';
$elements = is_array($searchTeam)? count($searchTeam): '0';
$deleteID = isset($_GET["deleteID"])? $_GET["deleteID"]: '0000';

// GETで現在のページ数を取得する（未入力の場合は1を挿入）
if (isset($_GET['page'])) {$page = (int)$_GET['page'];} else {$page = 1;}
// スタートのポジションを計算する
if ($page > 1) {$start = ($page * 6) - 6;} else {$start = 0;}

$array = isset($_SESSION['searchTeam'])? $_SESSION['searchTeam'] : '';


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

<form name="form1" id="form1" action="delete3.php" method="GET">
    <input type="hidden" name="deleteID" id="deleteID" value="<?php echo $deleteID ?>">
</form>

<form name="form2" id="form2" action="index2.php" method="GET"><!--not post but get just for test-->
<input type="hidden" name="sort" id="searchSort" value="<?php echo $sortOrder ?>">
<input type="hidden" name="column" id="searchColumn" value="<?php echo $sortBy ?>">
<input type="hidden" name="deleteID" id="deleteID" value="<?php echo $deleteID ?>">
</form>

<table id="players_list" class="players_list table table-striped">
    <th>&nbsp;&nbsp; No. <button class='button5' type="submit" onclick="sortFunction('No')"><i class="fa-solid fa-bars"></i></button>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;Name <button class='button5' type="submit" onclick="sortFunction('name')"><i class="fa-solid fa-bars"></i></button>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;Team <button class='button5' type="submit" onclick="sortFunction('Length(team)')"><i class="fa-solid fa-bars"></i></button>
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
    if($array == ''){
        $page_num = $dbh->prepare("SELECT COUNT(*) id FROM players WHERE `name` LIKE '%$searchName%'");
    }else{
        $page_num = $dbh->prepare("SELECT COUNT(*) id FROM players WHERE `name` LIKE '%$searchName%' AND `team` IN ($array)");}

    $page_num->execute();
    $page_num = $page_num->fetchColumn();
    // ページネーションの数を取得する
    $pagination = ceil($page_num / 6);
    ?>

    <a href="?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=1" class="<?php if($page == 1){echo "disabled";} ?>">
        <i class="fa-solid fa-angles-left"></i></a>
    <a href="?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php if($page > 1){echo $page-1;}else{echo 1;} ?>" class="<?php if($page == 1){echo "disabled";} ?>">
        <i class="fa-solid fa-angle-left"></i></a>&nbsp;
    <?php for ($x=1; $x <= $pagination ; $x++) { ?>
        <?php if($x == $page){$key = 'active';}else{$key = '';} ?>
        <a href="?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php echo $x ?>" class="<?php echo $key; ?>"><?php echo $x; ?></a>
    <?php } // End of for ?>&nbsp;
    <a href="?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php if($page < $pagination){echo $page+1;}else{echo $pagination;} ?>" class="<?php if($page == $pagination){echo "disabled";} ?>">
        <i class="fa-solid fa-angle-right"></i></a>
    <a href="?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php echo $pagination; ?>" class="<?php if($page == $pagination){echo "disabled";} ?>">
        <i class="fa-solid fa-angles-right"></i></a>

</div>
<div align="left">items: <?php echo $page_num; ?></div>
</div>
</form>

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
            var sort = "ASC";}

        document.getElementById("searchSort").setAttribute("value",sort);
        document.getElementById("searchColumn").setAttribute("value",param);
        document.form2.submit();
    }


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