<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="paginathing-master/paginathing.min.js"></script>
<link href="pagination.css" rel="stylesheet">

<div class="list-group">
    <div class="list-group-item"> Your Item 1</div>
    <div class="list-group-item"> Your Item 2</div>
    <div class="list-group-item"> Your Item 3</div>
    <div class="list-group-item"> Your Item 4</div>
    <div class="list-group-item"> Your Item 5</div>
    <div class="list-group-item"> Your Item 6</div>
    <div class="list-group-item"> Your Item 7</div>
    <div class="list-group-item"> Your Item 8</div>
    <div class="list-group-item"> Your Item 9</div>
    <div class="list-group-item"> Your Item 10</div>
    <div class="list-group-item"> Your Item 11</div>
    <div class="list-group-item"> Your Item 12</div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.list-group').paginathing({
            perPage: 4,
            firstLast: false,
            prevText:'prev' ,
            nextText:'next' ,
            activeClass: 'active',
        })
    });
</script>