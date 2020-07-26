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
        $topic_query = "SELECT * FROM topic WHERE tid=$tid";
        $topic_results = mysqli_query($conn,$topic_query);
        if(mysqli_num_rows($topic_results)>0){
            $row = mysqli_fetch_array($topic_results);
            $topic_name = $row['topic'];
            $topic_img = $row['img_loc'];
            $topic_creator = $row['creator'];

            $topic = "<h4>$topic_name</h4>
                        <h6>-$topic_creator</h6>
                        <img src='$topic_img' alt='' class='img-thumbnail rounded mx-auto d-block'>";

            echo $topic;

        }
        mysqli_close($conn);
    }
?>