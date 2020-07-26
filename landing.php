<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script defer src="../fontawesome/js/all.js"></script>


    <title>ArtCritiq</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <br>
    <h1>Your Courses:</h1>
    <br>
    <div id="stdCourses" >
    </div>
</body>

<script type="text/javascript">
var sid;
    $(document).ready(function(){
        sid = '<?php echo $_SESSION["user_id"]?>';
        $.ajax({
            type: 'post',
            url: 'get_ucourses.php',
            data: {sid:sid},
            success:function(data){
                $('#stdCourses').html(data);
            }
        });
    });
    
    var std_url ="http://dev.artcritiq.com/"

    function loadTopic(cid){
        var load = $('#load').load(std_url+'topics.php?cid='+cid);
    }
</script>
</html>