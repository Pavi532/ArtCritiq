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
        $admin_name = $_POST['admin_name'];
        $find_query = "SELECT * FROM course WHERE creator='$admin_name'";
        $find_results = mysqli_query($conn,$find_query);
        if(mysqli_num_rows($find_results)>0){
                echo "<option selected>Choose...</option>";
            while($row = mysqli_fetch_array($find_results)){
                echo "<option value=".$row['cid'].">".$row['cname']."</option>";
            }
        }else{
            echo "<option>No Topics Yet</option>";
        }
    }
?>