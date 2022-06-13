<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Trial</title>
    <link rel="icon" type="image/png" sizes="192x192" href="../../../images/android-chrome-192x192.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../../../css/styleSheet.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





<script type="text/javascript">
    $(function() {
        // クリックでモーダルオープン
        $('.trigger').on('click', function() {
            $('#modal').modal('show');
        });
        array = [];
        change_input_value(array);
        // チェックボックスをチェックしたら発動
        $('input[type="checkbox"]').click(function() {
            // チェックされているか配列で管理
            $number = $(this).val();
            array[$number] = 1;
            // チェックが外されたら配列のその値を削除
            if ($(this)[0].checked == false) {
                delete array[$number];
            }
            // 配列のkeyを渡す
            change_input_value(Object.keys(array));
        });
        // inputタグのvalueを変更
        function change_input_value(array) {
            input_values = $('#input');
            input_values.val(array);
        }
    });
</script>

