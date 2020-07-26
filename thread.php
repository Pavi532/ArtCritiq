<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script defer src="../fontawesome/js/all.js"></script>
    <title>Thread</title>
    <style>
        .fa-arrow-circle-up, .fa-arrow-circle-down{
            cursor:pointer;
        }
        .fa-arrow-circle-up:hover, .fa-arrow-circle-down:hover{
            color:red;
        }
        button{
            width:100%;
        }    
    </style>
</head>
<body>
    <?php
        session_start();
        
    ?>
    <br>
    <h1>Art Discussion:</h1>
    <br>
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
                <button type="button" class="btn btn-primary" onclick="addComment();"><b>Submit Critiq</b></button>
            <br>    
            </div>
        </div>
    </div>
</body>
<script type='text/javascript'>
    $(document).ready(function(){
        tid = '<?php echo isset($_GET['tid']) ? $_GET['tid'] : ""?>';
        $.ajax({
            type: 'post',
            url: 'get_topicDet.php',
            data: {tid:tid},
            success:function(data){
                $('#details').html(data);
            }
        });
    });
    function addComment(){
        var critique = $('textarea').val();
        sid = '<?php echo $_SESSION['user_id']?>';
        var uname = '<?php echo $_SESSION['uname']?>';
        
        $.ajax({
            type: 'post',
            url: 'add_critique.php',
            data: {sid:sid,tid:tid,uname:uname,critique:critique},
            success:function(data){
                alert(data);
                $('textarea').val("");
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
                url: 'get_critiques.php',
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
                url: 'admin/get_critiques_admin.php',
                data: {tid:tid},
                success:function(data){
                    $('#response').html(data);
                }
            });
            setTimeout(getCritiques_admin,500);
        }
        
        function upVote(uid,tid,id){
            if( sid != uid){
                $.ajax({
                type: 'post',
                url: 'votes_up.php',
                data: {uid:uid,tid:tid},
                success:function(data){
                    alert(data);
                }
            });
            }
            
        }

        function downVote(uid,tid,id){
            if( sid != uid){
                $.ajax({
                type: 'post',
                url: 'votes_down.php',
                data: {uid:uid,tid:tid},
                success:function(data){
                    alert(data);
                }
            });
            }
            
        }
</script>
</html>