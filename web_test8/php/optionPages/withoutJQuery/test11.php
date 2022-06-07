<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!--<script src="ajax.js"></script>-->
    <link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-180x180.png">
</head>

<div class="cnt_area"><span class="now_cnt">0</span> / 12</div>
<div id="name-group" class="form-group">
    <input type="text" id="name2" class="name2" name="name2" placeholder="name">
    <button class="submitButton" disabled>add!</button></div>
<li class="content">example</li>

<footer>
    <script>
        document.addEventListener('DOMContentLoaded', function(){

                //入力時のイベント
                $('#name2').keyup(function(){
                    $(".help-block3").remove();

                    //文字数を取得
                    var cnt = $(this).val().length;
                    //現在の文字数を表示
                    $('.now_cnt').text(cnt);
                    if (cnt > 12){
                        $("#name-group").append(
                            '<div class="alert alert-success help-block3" style="color: lime">' + "字数が超えてるよ 😢" + "</div>");
                        $('.cnt_area').css('color', 'red');
                        $('.submitButton').prop('disabled', true);
                    }else{
                        $('.cnt_area').css('color', 'black');
                        $('.submitButton').prop('disabled', false);}

                    //Ctrlキー連動のやつ
                    //テキストエリアがアクティブの状態にキーが押されたらイベントを発火
                    $('#name2').keydown(function(e){
                        //ctrlキーが押されてる状態か判定
                        if(event.ctrlKey){
                            //押されたキー（e.keyCode）が13（Enter）か　そしてテキストエリアに何かが入力されているか判定
                            if(e.keyCode === 13 && $(this).val()){
                                //フォームを送信
                                $(".content").text($("#name2").val());}
                            return false;
                        }
                    });

                });
                $('.submitButton').click(function(){
                    $("#name-group").append(
                        '<li>' + $("#name2").val() + "</li>");});

        });

    </script>
</footer>