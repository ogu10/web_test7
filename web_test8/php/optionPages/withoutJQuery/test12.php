<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-180x180.png">
    <link rel="stylesheet" href="test12.css">
</head>

<!-- タブに関わる要素をすべて.tab_areaの親要素で括る -->
<div class="tab_area">
    <!-- タブ選択ボタン 表示させたい要素をdata-targetで選択 最初に表示させたい要素はclassにselectedを付与 -->
    <div class="tab_btn_parent">
        <div class="tab_btn_children radius rolling selected" data-target=".tab_text1">プロフィール</div>
        <div class="tab_btn_children radius rolling" data-target=".tab_text2">制作実績</div>
        <div class="tab_btn_children radius rolling" data-target=".tab_text3">お問い合わせ</div>
    </div>
    <!-- タブ選択表示要素 data-targetで選ばれた要素を表示する -->
    <div class="tab_show_parent">
        <div class="tab_text1">
            aaaaaaaaaaa
        </div>
        <div class="tab_text2">
            bbbbbbbbbbbb
        </div>
        <div class="tab_text3">
            cccccccccccccc<br>
            cccccccccccccc
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function(){
        //最初にselectedがついた要素を表示させるために関数呼び出し
        tab_select();

        //選択されたタブをselectedに切り替える
        $('.tab_area .tab_btn_parent .tab_btn_children').click(function(){
            $(this).closest('.tab_btn_parent').find('.tab_btn_children').removeClass('selected');
            $(this).addClass('selected');
            tab_select();
        });

        //選択されたタブに連動して表示させたい要素を表示する
        function tab_select(){
            $('.tab_area').each(function(key, value){
                $(value).find('.tab_show_parent div').hide();
                var target = $(value).find('.tab_btn_parent .tab_btn_children.selected').data('target');
                $(value).find('.tab_show_parent').find(target).show();
            });
        }
    });
</script>