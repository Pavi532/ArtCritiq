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
        form{
            width:400px;
            margin-left:auto;
            margin-right:auto;
        }
        h1,h5{
            color: #209CEE;
        }
        h1{
            text-align:center;
        }
        .alTopic{
            width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <title>Topics</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <br>
    <h1>Topics you added</h1>
    <div id='topics'></div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        var creator = '<?php echo $_SESSION['uname']?>';
        $.ajax({
            type: 'post',
            url: 'get_ctopics.php',
            data: {creator:creator},
            success:function(data){
                $('#topics').html(data);
            }
        });
    });

    var std_url ="http://dev.artcritiq.com/admin/"

    function loadTopicDet(tid){
        var load = $('#dashmini').load(std_url+'award.php?tid='+tid);
    }
</script>
</html>