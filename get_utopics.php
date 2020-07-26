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
        $topic = "";
        $cid = $_POST['cid'];
        $status = 0;
        $topics_query = "SELECT * FROM topic WHERE cid=$cid AND status=$status";
        $topic_results = mysqli_query($conn,$topics_query);
        if(mysqli_num_rows($topic_results)>0){
            while($row = mysqli_fetch_array($topic_results)){
                $topic_name = $row['topic'];
                $tid = $row['tid'];
                $topic .= "<div class='alert alert-primary alTopic'>
                                <h5 style='display: inline'>$topic_name</h5>
                                <br><br><button id='btnLoadTopicDet' class='btn btn-primary btnTopic btn lg' onclick='loadTopicDet($tid)'>See More  <i class='fas fa-list'></i></button>
                            </div>";
            }
            echo $topic;
        }
        else{
            echo ("ERROR:\n".mysqli_error($conn));
            echo "No topics currently under this course";
        }
        mysqli_close($conn);
    }
?>