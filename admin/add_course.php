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
        $course_name = $_POST['course_name'];
        $admin_name = $_POST['admin_name'];
        $check_query = "SELECT * FROM course WHERE creator='$admin_name' AND cname='$course_name'";
        $check_result =mysqli_query($conn,$check_query);
        $num_row = mysqli_num_rows($check_result);
        if($num_row > 0){
            echo "You have already created a course named ' ".$course_name." '";
        }
        else{
            $course_query = "INSERT INTO course(cname,creator)
                        VALUES('$course_name','$admin_name')";
            $result = mysqli_query($conn,$course_query);
            if($result){
                echo "The Course: ".$course_name." was added successfuly";
            }
            else{
                echo ("ERROR:\n".mysqli_error($conn));
                echo "\nAdding failed";
            }
        }
        
        mysqli_close($conn);
    }
?>