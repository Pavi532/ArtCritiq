<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script defer src="../fontawesome/js/all.js"></script>
    <title>Topics</title>
</head>
<body>
    <?php
        session_start();
        // echo isset($_GET['cid']) ? $_GET['cid'] : "";
    ?>
    <br>
    <h1>Your Topics:</h1>
    <br>
    <div id='topics'></div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        var cid = '<?php echo isset($_GET['cid']) ? $_GET['cid'] : ""?>';
        $.ajax({
            type: 'post',
            url: 'get_utopics.php',
            data: {cid:cid},
            success:function(data){
                $('#topics').html(data);
            }
        });
    });

    var std_url ="http://dev.artcritiq.com/"

    function loadTopicDet(tid){
        var load = $('#load').load(std_url+'thread.php?tid='+tid);
    }
</script>
</html>