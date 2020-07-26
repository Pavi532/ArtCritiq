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
    <title>Create Course</title>
</head>
<body>
    <br>
    <h1>Create Course</h1>
    <div class="container cform">
        <?php
        session_start();
        ?>
            <form id="addCourse"  method="post" onsubmit="createCourse()">
                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name" name="course_name">
                </div>
                <button type="submit" class="btn btn-primary">Create Course</button>
            </form>
    </div>
</body>
<script type="text/javascript">
    
    function createCourse(){
        event.preventDefault();
        if($('#course_name').val() !=''){
            var course_name= $('#course_name').val();
            var admin_name= '<?php echo $_SESSION['uname']?>';
            $.ajax({
                type: 'post',
                url: 'add_course.php',
                data: {course_name:course_name,admin_name:admin_name},
                success: function(data){
                    alert(data);
                }
            });
        }
        else{
            alert("Please enter a course name");
        }
        
    }
</script>
</html>