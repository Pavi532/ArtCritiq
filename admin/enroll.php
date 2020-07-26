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
    </style>
    <title>Courses</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <br>
    <h1>Enroll Students</h1>
    <form id="enroll">
        <label for="cusSelect">Course:</label>
        <select class="custom-select" id="cusSelect" name='cusSelect' required>
            <option selected>Choose...</option>
        </select>
        <br><br>
        <label for="stdSelect">Student:</label>
        <input class="form-control mr-sm-2" list="search_results"  id="search_text" name="search_text" type="text" placeholder="Enter student email">
        <datalist id="search_results">
        </datalist>
        <br>
        <button type="submit" class="btn btn-primary" onclick="enroll();">Enroll</button>
        <br><br>
        <div id="enrolled">
            <h5>Students enrolled to the course will be shown here..</h5>
            <ul id="stdEmails"></ul>
        </div>
    </form>

</body>
<script type="text/javascript">

var admin_name;

    $(document).ready(function(){
        admin_name = '<?php echo $_SESSION['uname']?>';
        console.log(admin_name);
        $.ajax({
            type: 'post',
            url: 'get_courses.php',
            data: {admin_name:admin_name},
            success: function(data){
                $('#cusSelect').html(data);
            }
        });
    });

    $(document).ready(function(){
    $('#search_text').keyup(function(){
        text = $(this).val();
        if(text==""){
            text ="";
        }
        console.log('Search for: '+ text);
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: 'get_student.php',
                data: {search:text},
                success:function(data){
                    $('#search_results').html(data);
                }
            });
    })
    });


    function enroll(){
        event.preventDefault();
        var option = document.getElementById('cusSelect');
        var cid = option.options[option.selectedIndex].value;
        var email = document.getElementById('search_text').value;
        $.ajax({
            type: 'post',
            url: 'enroll_student.php',
            data: {cid:cid,email:email},
            success:function(data){
                console.log(data);
                $('#stdEmails').html(data);
            }
        });
    }


</script>
</html>