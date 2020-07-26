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
        $level= 0;
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
                if($cre_votes == 1){
                    $color = "red";
                }
                else{
                    $color ="grey";
                }
                $critiques .= "<div class='alert alert-secondary'>
                                <h6>$uname :<h6>
                                <p>$critique</p>
                                <i id='up$id' class='fas fa-arrow-circle-up' onclick='upVote($uid,$tid,$id);'></i><span>&nbsp;&nbsp;&nbsp;$std_votes&nbsp;&nbsp;</span>
                                <i id='down$id'class='fas fa-arrow-circle-down' onclick='downVote($uid,$tid,$id);'></i>
                                &nbsp;&nbsp;&nbsp;<i class='fas fa-award' style='color:$color'></i>
                                </div>";
            }
            echo $critiques;
        }
        else{
            echo "You are the first to critique.";
        }
    }
?>