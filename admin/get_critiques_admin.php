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
        $critiques = "";
        $level= 1;
        $tid = $_POST['tid'];
        $get_query = "SELECT * FROM critiques WHERE tid=$tid AND access_level=$level ORDER BY std_vote DESC";
        $results = mysqli_query($conn,$get_query);
        if(mysqli_num_rows($results)>0){
            while($row = mysqli_fetch_array($results)){
                $uid = $row['uid'];
                $id = $row['id'];
                $uname = $row['uname'];
                $critique = $row['critique'];
                $std_votes = $row['std_vote'];
                $cre_votes = $row['cre_vote'];
                $critiques .= "<div class='alert alert-danger'>
                                <h5>Instructor: $uname</h5>
                                <p>$critique</p>
                                </div>";
            }
            echo $critiques;
        }
        else{
            echo "<div class='alert alert-danger'> Instructors opinion will be here</div>";
        }
    }
?>