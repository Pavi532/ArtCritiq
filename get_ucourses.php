<?php
    $host = "localhost";
    $db_name = "artcritiqdb";
    $username = "root";
    $password = "root";

    $conn=mysqli_connect($host,$username,$password,$db_name);
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        $courses = "";
        $cid = "";
        $sid = $_POST['sid'];
        $check_query = "SELECT * FROM user_courses WHERE sid='$sid'";
        $check_results = mysqli_query($conn,$check_query);
        if(mysqli_num_rows($check_results)>0){
            while($row = mysqli_fetch_array($check_results)){
                $cid = $row['cid'];
                $course_query = "SELECT * FROM course WHERE cid='$cid'";
                $course_results = mysqli_query($conn,$course_query);
                if(mysqli_num_rows($course_results)>0){
                    $course_row  = mysqli_fetch_array($course_results);
                    $course_name = $course_row['cname'];
                    $course_creator = $course_row['creator'];

                    $courses .= "<div class='alert alert-primary alCourse' >
                                    <h5 style='display: inline'>$course_name</h5><h6 style='display: inline'> -by $course_creator &nbsp</h6>
                                    <button id='btnLoadTopics' class='btn btn-primary btnCourses btn lg' onclick='loadTopic($cid)'>See Topics <i class='fas fa-list'></i></button>
                                </div>";

                }

            }
            echo $courses;
        }
        else{
            //echo ("ERROR:\n".mysqli_error($conn));
            echo "You have not been enrolled to any course. Please contact your instructor to enroll you in their courses.";
        }
        
    }
?>