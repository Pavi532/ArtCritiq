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

        $img_name = $_POST['img_name'];
        $topic = addslashes($_POST['topic']);
        $cid = $_POST['course_id'];
        $admin_name = $_POST['admin_name'];
        $filepath_temp = $_POST['filepath_temp'];
        $directory_perma = '../uploads/';
        $created = date('Y-m-d H:i:s');
        $status=0;

        $filpath_perma = $directory_perma.$img_name;

        rename($filepath_temp,$filpath_perma);

        $add_query = "INSERT INTO topic(cid,topic,img_loc,status,created,creator)VALUES('$cid','$topic','$filpath_perma','$status','$created','$admin_name')";
        $result = mysqli_query($conn,$add_query);
        if($result){
            echo "Topic added";
        }
        else{
            echo ("ERROR:\n".mysqli_error($conn));
            echo "\nAdding failed";
        }
    }
?>