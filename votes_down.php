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
        $tid = $_POST['tid'];
        $uid = $_POST['uid'];
        $upvote_query = "UPDATE critiques SET std_vote = std_vote - 1  WHERE tid=$tid AND uid=$uid";
        $upvote_result = mysqli_query($conn,$upvote_query);
        if($upvote_result){
            echo "downvoted";
        }
        else{
            echo ("ERROR:\n".mysqli_error($conn));
        }
        mysqli_close($conn);
    }
?>