<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script defer src="../fontawesome/js/all.js"></script>
    <style type="text/css">
        .fa-award{
            cursor:pointer;
        }
        h1{
            color: #209CEE;
        }
        h1{
            text-align:center;
        }
        .row{
            margin-left:0;
            margin-right:0;
        }
    </style>
    <title>Award</title>
</head>
<body>
<?php
        session_start();
    ?>
    <br>
    <h1>Student's responses</h1>
    <div class="row">
        <div class="col-6" id="details"></div>
        <div class="col-6">
            <br><br><br><br>
            <div id="response"></div>
            <div id="all" style='overflow:scroll;'></div>
            <br>
            <div id="user">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Your Thoughts:</span>
                </div>
                <textarea class="form-control" aria-label="Your Thoughts"></textarea>
                
            </div>
            <br>
                <button type="button" class="btn btn-primary" onclick="addComment();">Submit</button>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        tid = '<?php echo isset($_GET['tid']) ? $_GET['tid'] : ""?>';
        $.ajax({
            type: 'post',
            url: '../get_topicDet.php',
            data: {tid:tid},
            success:function(data){
                $('#details').html(data);
            }
        });
    });

    function addComment(){
        var critique = $('textarea').val();
        sid = '<?php echo $_SESSION['user_id']?>';
        uname = '<?php echo $_SESSION['uname']?>';
        
        $.ajax({
            type: 'post',
            url: 'add_critique2.php',
            data: {sid:sid,tid:tid,uname:uname,critique:critique},
            success:function(data){
                $('textarea').val("");
                getCritiques2();
            }
        });
        
    }

    $('#all').ready(function(){
            getCritiques();
            getCritiques_admin();
    });

    function getCritiques(){
        $.ajax({
            type: 'post',
            url: 'get_critiques2.php',
            data: {tid:tid},
            success:function(data){
                $('#all').html(data);
            }
        });
        setTimeout(getCritiques,500);
    }

    function getCritiques_admin(){
        $.ajax({
            type: 'post',
            url: 'get_critiques_admin.php',
            data: {tid:tid},
            success:function(data){
                $('#response').html(data);
            }
        });
    }

    function award(id){
        $.ajax({
                type: 'post',
                url: 'votes_award.php',
                data: {id:id},
                success:function(data){
                    alert(data);
                }
            });
            
        }

</script>
</html>