<head>
<!--    <link rel="stylesheet" href="/web_test3/pages/test7/test4.css">
    <link rel="stylesheet" href="/web_test3/pages/test7/Mr_button.css">-->
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
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

<form name="form1" id="form1" action="php/delete.php" method="GET">
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
        <td>
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

<?php for ($x=1; $x <= $pagination ; $x++) { ?>
<a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
<?php } // End of for ?>
</div>
</form>


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