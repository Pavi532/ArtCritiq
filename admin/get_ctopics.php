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
        $topics = "";
        $creator_name = $_POST['creator'];
        $topics_query = "SELECT * FROM topic WHERE creator='$creator_name'";
        $topic_results = mysqli_query($conn,$topics_query);
        if(mysqli_num_rows($topic_results)>0){
            
            while($row = mysqli_fetch_array($topic_results)){
                $tid = $row['tid'];
                $topic = $row['topic'];
                
                $topics .= "<div class='alert alert-primary alTopic'>
                                <h5 style='display: inline'>$topic</h5>
                                <br><br>
                                <button id='btnLoadTopicDet' class='btn btn-primary btnTopic btn lg' onclick='loadTopicDet($tid)'>See More  <i class='fas fa-list'></i></button>
                            </div>";
            }
            echo $topics;
        }
        else{
            echo ("ERROR:\n".mysqli_error($conn));
            echo "You have created no topics";
        }
    }
?>