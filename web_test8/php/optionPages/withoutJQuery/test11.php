
<link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-180x180.png">


<!-- コメント送信フォーム -->
<form method="post" action="/comment/" id="commentSubmit">
    <textarea name="comment" rows="3" id="commentInput"></textarea>
    <input type="submit" value="コメントする">
</form>

<!-- Jqueryの読み込み -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- 処理を記入 -->
<script>
    $(function(){
        //テキストエリアがアクティブの状態にキーが押されたらイベントを発火
        $('#commentInput').keydown(function(e){
            //ctrlキーが押されてる状態か判定
            if(event.ctrlKey){
                //押されたキー（e.keyCode）が13（Enter）か　そしてテキストエリアに何かが入力されているか判定
                if(e.keyCode === 13 && $(this).val()){
                    //フォームを送信
                    $('#commentSubmit').submit();
                    return false;
                }
            }
        });
    });
</script>