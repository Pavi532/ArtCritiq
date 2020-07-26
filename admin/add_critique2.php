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
        $uid = $_POST['sid'];
        $tid = $_POST['tid'];
        $uname = $_POST['uname'];
        $critique = addslashes($_POST['critique']);
        $created = date('Y-m-d H:i:s');
        $level = 1;
        if($critique != ""){
            $critique_query = "INSERT INTO critiques(tid,uid,uname,critique,created, access_level)
                            VALUES('$tid','$uid','$uname','$critique','$created','$level')";
        
            $result = mysqli_query($conn,$critique_query);
            if($result){
                echo "Critique added";
            }
            else{
                echo ("ERROR:\n".mysqli_error($conn));
                echo "\nAdding failed";
            }
        }
        else{
            echo "Cannot add empty critique";
        }
        
        mysqli_close($conn);
    }
?>