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
        date_default_timezone_set('Asia/Colombo');
        $cid = $_POST['cid'];
        $email = $_POST['email'];
        $created = date('Y-m-d H:i:s');
        $status = 1;
        $check_query = "SELECT * FROM user_courses WHERE cid='$cid' AND email='$course_name' AND estatus='$status'";
        $check_result =mysqli_query($conn,$check_query);
        $num_row = mysqli_num_rows($check_result);
        if($num_row > 0){
            echo "You have already enroled this student to this course";
        }
        else{
            $sid_query = "SELECT id FROM users WHERE email='$email'";
            $sid_result = mysqli_query($conn,$sid_query);
            $sid_rows = mysqli_num_rows($sid_result);
            if($sid_rows > 0){
                $row = mysqli_fetch_array($sid_result);
                $sid = $row['id'];
                $enroll_query  = "INSERT INTO user_courses(cid,sid,email,created,estatus)
                                VALUES('$cid','$sid','$email','$created','$status')";
                $result = mysqli_query($conn,$enroll_query);
                if($result){
                    echo "<li>Email: ".$email." Course id: ".$cid."</li>";
                }
                else{
                    echo ("ERROR:\n".mysqli_error($conn));
                    echo "\nAdding failed";
                }
            }
            
            mysqli_close($conn);
        }
    }
?>