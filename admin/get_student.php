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
    $output ="";
    if($_POST['search'] != ""){
        $search_query = "SELECT * FROM users WHERE email LIKE '%".$_POST["search"]."%' AND access_level='0'";
        $result = mysqli_query($conn,$search_query);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $output .= "<option value=".$row["email"].">";
            }
            echo $output;
        }
    }
    else{
        echo "No match";
    }
}
?>