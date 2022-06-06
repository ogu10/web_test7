<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-180x180.png">
</head>



<div id="form">
    <input type="text">
</div>
<input type="button" value="+" id="addForm">



<script>
    $(function(){
        $('#addForm').click(function(){
            var inputCount = $('#form input:last-child').attr('data-inputCount');
            var next_num = parseInt(inputCount) + 1;
            if(next_num == 10/* ←上限 */) {
                $('#addForm').remove();
            } else {
                $('#form').append('<input type="text" data-inputCount="' + next_num + '">');
            }
        });
    });
</script>